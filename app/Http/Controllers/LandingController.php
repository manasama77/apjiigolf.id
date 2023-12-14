<?php

namespace App\Http\Controllers;

use Exception;
use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Player;
use App\Models\Undian;
use Milon\Barcode\DNS2D;
use App\Mail\InvoiceMail;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\EventLocation;
use App\Models\PlayerHistory;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;

class LandingController extends Controller
{
    private $location_name;
    private $location_address;
    private $event_date;
    private $event_time;
    private $ticket_price;
    private $admin_fee;

    public function __construct()
    {
        $this->location_name    = 'Gobar @ Parahyangan Golf';
        $this->location_address = 'Jl. Saridewata No.1, Cikande, Kec. Padalarang, Kabupaten Bandung Barat, Jawa Barat 40553';
        $this->event_date       = Carbon::parse('2023-12-14');
        $this->event_time       = '08:30 till end';
        $this->ticket_price     = 1400000;
        $this->admin_fee        = 5000;
    }

    public function index(Request $request)
    {
        $page_title = "Standing";

        // $tp = $request->tp ?? "desc";
        // $g  = $request->g ?? "asc";
        // $h  = $request->h ??  "asc";
        // $n  = $request->n ?? "asc";

        $g  = $request->g ?? null;
        $h  = $request->h ??  null;
        $n  = $request->n ?? null;

        if ($g) {
            $players = Player::orderBy("total_play", "desc")->orderBy("gross", $g)->get();
        } elseif ($h) {
            $players = Player::orderBy("total_play", "desc")->orderBy("handicap", $h)->get();
        } elseif ($n) {
            $players = Player::orderBy("total_play", "desc")->orderBy("net", $n)->get();
        } else {
            $g = "asc";
            $players = Player::orderBy("total_play", "desc")->orderBy("gross", $g)->get();
        }

        $data = [
            'page_title' => $page_title,
            'g'          => $g,
            'h'          => $h,
            'n'          => $n,
            'players'    => $players,
        ];
        return view('pages.home.main', $data);
    }

    public function player_event_history($player_id)
    {
        $page_title = "Player Event History";
        $player_name = Player::find($player_id)->name;

        $players = EventLocation::select([
            'event_locations.id',
            'locations.name as nama_lokasi',
            'locations.address as alamat_lokasi',
            'locations.banner',
            'event_locations.start_date',
            'player_histories.out',
            'player_histories.in',
            'player_histories.gross',
            'player_histories.handicap',
            'player_histories.net',
        ])
            ->leftJoin('locations', 'locations.id', '=', 'event_locations.location_id')
            ->leftJoin('player_histories', 'player_histories.event_location_id', '=', 'event_locations.id')
            ->where('player_histories.player_id', $player_id)
            ->orderBy('event_locations.start_date', 'desc')
            ->get();

        // dd($players);

        $data = [
            'page_title'  => $page_title,
            'player_name' => $player_name,
            'players'     => $players,
        ];
        return view('pages.player.location_history', $data);
    }

    public function player_event_history_score($player_histories_id)
    {
        $page_title = "Player Event History Score";

        $players = PlayerHistory::with([
            'player',
            'event_location',
            'event_location.location',
        ])
            ->find($player_histories_id);

        // dd($players->event_location->location);

        $data = [
            'page_title' => $page_title,
            'players'    => $players,
        ];
        return view('pages.player.score_history', $data);
    }

    public function ty()
    {
        return view('ty');
    }

    public function pairing()
    {
        return view('pairing_gobar_3');
    }

    public function undian()
    {
        return view('undian');
    }

    public function undian_winner()
    {
        $data  = Undian::select('id', 'name')
            ->where('winner', 1)
            ->orderBy('updated_at', 'desc')
            ->get();
        $count = $data->count();

        return response()->json([
            'count' => $count,
            'data'  => $data,
        ]);
    }

    public function undian_peserta()
    {
        $data  = Undian::select('id', 'name')
            ->where('winner', 0)
            ->get();

        $count = $data->count();

        return response()->json([
            'count' => $count,
            'data'  => $data,
        ]);
    }

    public function undian_store(Request $request)
    {
        $id = $request->id;

        if ($id) {
            $exec = Undian::find($id);
            $exec->winner = 1;
            $exec->save();
        }

        return response()->json([
            'data' => $exec,
        ]);
    }

    public function register()
    {
        $location_name    = $this->location_name;
        $location_address = $this->location_address;
        $event_date       = $this->event_date;
        $event_time       = $this->event_time;
        $ticket_price     = $this->ticket_price;
        $ticket_price_idr = number_format($ticket_price, 0);
        $admin_fee        = $this->admin_fee;
        $admin_fee_idr    = number_format($admin_fee, 0);
        $total_price      = $ticket_price + $admin_fee;
        $total_price_idr  = number_format($total_price, 0);

        $data = [
            'location_name'    => $location_name,
            'location_address' => $location_address,
            'event_date'       => $event_date,
            'event_time'       => $event_time,
            'ticket_price_idr' => $ticket_price_idr,
            'admin_fee_idr'    => $admin_fee_idr,
            'total_price_idr'  => $total_price_idr,
        ];

        return view('register', $data);
    }

    // public function register_store(RegisterRequest $request)
    // {
    //     try {
    //         $barcode        = $this->generate_secret_key(6);
    //         $order_id       = $this->generate_invoice_number();
    //         $invoice_number = $order_id['invoice_number'];
    //         $seq            = $order_id['seq'];
    //         $gross_amount   = $this->ticket_price + $this->admin_fee;
    //         $event_location = EventLocation::with([
    //             'location'
    //         ])->where('is_active', 1)->first();

    //         if (!$event_location) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'No Event Active Right Now',
    //             ]);
    //         }

    //         $transaction_info = [
    //             "transaction_details" => [
    //                 "order_id"     => $invoice_number,
    //                 "gross_amount" => $gross_amount
    //             ],
    //             "item_details" => [
    //                 [
    //                     "id"       => 1,
    //                     "price"    => $this->ticket_price,
    //                     "quantity" => 1,
    //                     "name"     => "E-Ticket PGA GOBAR Series - " . $event_location->location->name . " - " . $event_location->start_date->format('d M Y'),
    //                 ],
    //                 [
    //                     "id"       => "admin_fee",
    //                     "price"    => $this->admin_fee,
    //                     "quantity" => 1,
    //                     "name"     => "Admin Fee Registration PGA Golf Series",
    //                 ],
    //             ],
    //             "customer_details" => [
    //                 "first_name" => $request->full_name,
    //                 "email"      => $request->email,
    //                 "phone"      => $request->whatsapp_number,
    //             ]
    //         ];

    //         Config::$isProduction = config('midtrans.production');
    //         Config::$serverKey    = config('midtrans.server_key');
    //         Config::$clientKey    = config('midtrans.client_key');
    //         Config::$isSanitized  = config('midtrans.is_sanitized');
    //         Config::$is3ds        = config('midtrans.is_3ds');
    //         $snap_token           = Snap::getSnapToken($transaction_info);

    //         // create invoice pdf
    //         $data_pdf_invoice = [
    //             'player_name'    => $request->full_name,
    //             'invoice_number' => $invoice_number,
    //             'invoice_date'   => Carbon::now()->format('d M Y'),
    //             'event_name'     => $this->location_name,
    //             'event_location' => $this->location_address,
    //             'event_date'     => $this->event_date->format('d M Y'),
    //             'ticket_price'   => $this->ticket_price,
    //             'admin_fee'      => $this->admin_fee,
    //             'grand_total'    => $gross_amount,
    //         ];
    //         $pdf = Pdf::loadView('layouts.invoice', $data_pdf_invoice)->setPaper('A4', 'portrait');
    //         // return $pdf->stream('test.pdf', array("Attachment" => false));

    //         Storage::disk('public')->put('invoice/' . $order_id . '.pdf', $pdf->output());



    //         // create PDF e-ticket
    //         // $plugin_barcode = new DNS2D();
    //         // $bar = '<img src="data:image/png;base64,' . $plugin_barcode->getBarcodePNG($barcode, 'QRCODE', 25, 25, [0, 0, 0]) . '" alt="barcode"   />';

    //         // $data_pdf = [
    //         //     'bar'       => $bar,
    //         //     'barcode'   => $barcode,
    //         //     'full_name' => $request->full_name,
    //         // ];
    //         // $custom_paper = [0, 0, 1000, 1778];
    //         // $pdf          = Pdf::loadView('layouts.e_ticket', $data_pdf)->setPaper($custom_paper);
    //         // // DEBUG PURPOSE
    //         // return $pdf->stream('test.pdf', array("Attachment" => false));

    //         // $slug_location_name = Str::slug($event_location->location->name);
    //         // $content = $pdf->download()->getOriginalContent();
    //         // $nama_file = $request->nama_lengkap . "-" . $barcode . ".pdf";
    //         // Storage::disk('public')->put('eticket/' . $slug_location_name . '/' . $nama_file, $content);

    //         $exec = Registration::create([
    //             'full_name'       => $request->full_name,
    //             'gender'          => $request->gender,
    //             'email'           => $request->email,
    //             'whatsapp_number' => $request->whatsapp_number,
    //             'company_name'    => $request->company_name,
    //             'position'        => $request->position,
    //             'institution'     => $request->institution,
    //             'institution_etc' => $request->institution_etc,
    //             'order_id'        => $invoice_number,
    //             'ticket_price'    => $this->ticket_price,
    //             'admin_fee'       => $this->admin_fee,
    //             'total_price'     => $this->ticket_price + $this->admin_fee,
    //             'payment_status'  => 0,
    //             'snap_token'      => $snap_token,
    //             'barcode'         => $barcode,
    //             'seq'             => $seq,
    //         ]);

    //         // debug purpose
    //         return (new InvoiceMail($exec))->render();

    //         Mail::mailer('smtp_mailtrap')->to($request->email)->bcc([
    //             'adam.pm77@gmail.com',
    //             'betharifarisha@gmail.com',
    //         ])->send(new InvoiceMail($exec));

    //         // return response()->json([
    //         //     'success'    => true,
    //         //     'data'       => $exec,
    //         //     'snap_token' => $snap_token,
    //         // ], 200);

    //         return redirect()->route('register_success', ['order_id' => $invoice_number]);
    //     } catch (Exception $e) {
    //         return redirect('/#registration')->withErrors($e->getMessage())->withInput();
    //         // return response()->json([
    //         //     'success' => false,
    //         //     'message' => $e->getMessage(),
    //         // ]);
    //     }
    // }

    public function register_store(RegisterRequest $request)
    {
        $barcode        = $this->generate_secret_key(6);
        $order_id       = $this->generate_invoice_number();
        $invoice_number = $order_id['invoice_number'];
        $seq            = $order_id['seq'];
        $gross_amount   = $this->ticket_price + $this->admin_fee;
        $event_location = EventLocation::with([
            'location'
        ])->where('is_active', 1)->first();

        if (!$event_location) {
            return response()->json([
                'success' => false,
                'message' => 'No Event Active Right Now',
            ]);
        }

        $transaction_info = [
            "transaction_details" => [
                "order_id"     => $invoice_number,
                "gross_amount" => $gross_amount
            ],
            "item_details" => [
                [
                    "id"       => 1,
                    "price"    => $this->ticket_price,
                    "quantity" => 1,
                    "name"     => "E-Ticket PGA GOBAR Series - " . $event_location->location->name . " - " . $event_location->start_date->format('d M Y'),
                ],
                [
                    "id"       => "admin_fee",
                    "price"    => $this->admin_fee,
                    "quantity" => 1,
                    "name"     => "Admin Fee Registration PGA Golf Series",
                ],
            ],
            "customer_details" => [
                "first_name" => $request->full_name,
                "email"      => $request->email,
                "phone"      => $request->whatsapp_number,
            ]
        ];

        Config::$isProduction = config('midtrans.production');
        Config::$serverKey    = config('midtrans.server_key');
        Config::$clientKey    = config('midtrans.client_key');
        Config::$isSanitized  = config('midtrans.is_sanitized');
        Config::$is3ds        = config('midtrans.is_3ds');
        $snap_token           = Snap::getSnapToken($transaction_info);

        // create invoice pdf
        $data_pdf_invoice = [
            'player_name'    => $request->full_name,
            'invoice_number' => $invoice_number,
            'invoice_date'   => Carbon::now()->format('d M Y'),
            'event_name'     => $this->location_name,
            'event_location' => $this->location_address,
            'event_date'     => $this->event_date->format('d M Y'),
            'ticket_price'   => $this->ticket_price,
            'admin_fee'      => $this->admin_fee,
            'grand_total'    => $gross_amount,
        ];
        $pdf = Pdf::loadView('layouts.invoice', $data_pdf_invoice)->setPaper('A4', 'portrait');
        // return $pdf->stream('test.pdf', array("Attachment" => false));

        Storage::disk('public')->put('invoice/' . $invoice_number . '.pdf', $pdf->output());



        // create PDF e-ticket
        // $plugin_barcode = new DNS2D();
        // $bar = '<img src="data:image/png;base64,' . $plugin_barcode->getBarcodePNG($barcode, 'QRCODE', 25, 25, [0, 0, 0]) . '" alt="barcode"   />';

        // $data_pdf = [
        //     'bar'       => $bar,
        //     'barcode'   => $barcode,
        //     'full_name' => $request->full_name,
        // ];
        // $custom_paper = [0, 0, 1000, 1778];
        // $pdf          = Pdf::loadView('layouts.e_ticket', $data_pdf)->setPaper($custom_paper);
        // // DEBUG PURPOSE
        // return $pdf->stream('test.pdf', array("Attachment" => false));

        // $slug_location_name = Str::slug($event_location->location->name);
        // $content = $pdf->download()->getOriginalContent();
        // $nama_file = $request->nama_lengkap . "-" . $barcode . ".pdf";
        // Storage::disk('public')->put('eticket/' . $slug_location_name . '/' . $nama_file, $content);

        $exec = Registration::create([
            'full_name'       => $request->full_name,
            'gender'          => $request->gender,
            'email'           => $request->email,
            'whatsapp_number' => $request->whatsapp_number,
            'company_name'    => $request->company_name,
            'position'        => $request->position,
            'institution'     => $request->institution,
            'institution_etc' => $request->institution_etc,
            'order_id'        => $invoice_number,
            'ticket_price'    => $this->ticket_price,
            'admin_fee'       => $this->admin_fee,
            'total_price'     => $this->ticket_price + $this->admin_fee,
            'payment_status'  => 0,
            'snap_token'      => $snap_token,
            'barcode'         => $barcode,
            'seq'             => $seq,
        ]);

        $link_bayar = route('register_status', ['order_id' => $invoice_number]);

        // debug purpose
        // return (new InvoiceMail($exec, $this->location_name, $link_bayar))->render();

        Mail::mailer('smtp_mailtrap')->to($request->email)->bcc([
            'adam.pm77@gmail.com',
            'betharifarisha@gmail.com',
        ])->send(new InvoiceMail($exec, $this->location_name, $link_bayar));

        // return response()->json([
        //     'success'    => true,
        //     'data'       => $exec,
        //     'snap_token' => $snap_token,
        // ], 200);

        return redirect()->route('register_status', ['order_id' => $invoice_number]);
    }

    public function register_check(Request $request)
    {
        $location_name = $this->location_name;
        return view('register_check', compact('location_name'));
    }

    public function register_status(Request $request)
    {
        $order_id = $request->order_id;
        $exec = Registration::where('order_id', $order_id)->first();
        if (!$exec) {
            return abort(404, 'Data Not Found');
        }

        $location_name  = $this->location_name;
        $payment_status = $exec->payment_status;
        $snap_token     = $exec->snap_token;

        $data = [
            'location_name'  => $location_name,
            'payment_status' => $payment_status,
            'snap_token'     => $snap_token,
        ];
        return view('register_status', $data);
    }

    public function register_success(Request $request)
    {
        $order_id = $request->order_id;
        // $exec = Registration::where('order_id', $order_id)->where('payment_status', 1)->first();
        $exec = Registration::where('order_id', $order_id)->first();
        if (!$exec) {
            return abort(404, 'Data Not Found');
        }

        $location_name = $this->location_name;
        return view('register_success', compact('location_name'));
    }

    public function register_error()
    {
        //
    }

    public function gobar_2()
    {
        $page_title = "Gobar @ Klub Bogor Raya";
        $data = [
            'page_title' => $page_title,
        ];
        return view('gobar_2', $data);
    }

    public function gobar_1()
    {
        $page_title = "Gobar @ Sentul Highlands";
        $data = [
            'page_title' => $page_title,
        ];
        return view('gobar_1', $data);
    }

    public function gobar_0()
    {
        $page_title = "Gobar @ Riverside Cimanggis";
        $data = [
            'page_title' => $page_title,
        ];
        return view('gobar_0', $data);
    }

    public function apjii_golf_6()
    {
        $page_title = "APJII GOLF 6";
        $data = [
            'page_title' => $page_title,
        ];
        return view('apjii_golf_6', $data);
    }

    public function apjii_golf_5()
    {
        $page_title = "APJII GOLF 5";
        $data = [
            'page_title' => $page_title,
        ];
        return view('apjii_golf_5', $data);
    }

    public function generate_invoice()
    {
    }

    protected function generate_secret_key(int $length = 64, string $keyspace = '123456789'): string
    {
        if ($length < 1) {
            throw new Exception("Length must be a positive integer");
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }
        $number = implode('', $pieces);

        if ($this->check_secret_key_exist($number)) {
            return $this->generate_secret_key($length);
        }
        return $number;
    }

    protected function check_secret_key_exist($number)
    {
        return Registration::where('barcode', $number)->exists();
    }

    public function generate_invoice_number()
    {
        $last_seq = Registration::orderBy('seq', 'desc')->first();

        if (!$last_seq) {
            $seq = 1;
        } else {
            $seq = $last_seq->seq + 1;
        }

        $prefix = "PGA";
        $year   = Carbon::now()->format('Y');
        $month  = Carbon::now()->format('m');
        $random = rand(100, 999);

        $invoice_number = $prefix . "-" . $year . $month . $seq . $random;

        return [
            'invoice_number' => $invoice_number,
            'seq'            => $seq,
        ];
    }
}
