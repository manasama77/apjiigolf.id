<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\RegistrationStatus;

class ApjiiTournamentController extends Controller
{
    private $event_name;
    private $event_date;
    private $event_time;
    private $location_name;
    private $location_address;
    private $google_maps_url;
    private $google_maps_embed;
    private $ticket_price;
    private $early_price;
    private $admin_fee;
    private $no_rekening;
    private $bank_rekening;
    private $nama_rekening;
    private $wa_pic;
    private $registration_status;
    private $early_bird_start;
    private $early_bird_end;
    private $reguler_start;
    private $reguler_end;

    public function __construct()
    {
        $this->event_name          = 'APJII GOLF TOURNAMENT 7';
        $this->event_date          = Carbon::parse('2024-08-25');
        $this->event_time          = '12:00 till end';
        $this->location_name       = 'Pondok Indah Golf Course';
        $this->location_address    = 'Jl. Metro Pondok Indah No.16, RT.1/RW.16, Pd. Pinang, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12310';
        $this->google_maps_url     = "https://maps.app.goo.gl/zCLyP7rDaVCm3HoN8";
        $this->google_maps_embed   = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15863.835569909455!2d106.7849619!3d-6.2691368!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a490b60e41%3A0xaf08accee7decdf8!2sPondok%20Indah%20Golf%20Course!5e0!3m2!1sen!2sid!4v1720757045886!5m2!1sen!2sid";
        $this->ticket_price        = 3_750_000;
        $this->early_price         = 3_500_000;
        $this->admin_fee           = 0;
        $this->no_rekening         = "6630306017";
        $this->bank_rekening       = "BCA";
        $this->nama_rekening       = "Victor Henry Raymond";
        $this->wa_pic              = '6281316426789';
        $this->registration_status = $this->registration_status();
        $this->early_bird_start    = Carbon::parse('2024-07-12');
        $this->early_bird_end      = Carbon::parse('2024-07-31');
        $this->reguler_start       = Carbon::parse('2024-08-01');
        $this->reguler_end         = Carbon::parse('2024-08-15');
    }

    public function index()
    {
        $event_name          = $this->event_name;
        $event_date          = $this->event_date;
        $event_time          = $this->event_time;
        $location_name       = $this->location_name;
        $location_address    = $this->location_address;
        $google_maps_url     = $this->google_maps_url;
        $google_maps_embed   = $this->google_maps_embed;
        $ticket_price        = $this->ticket_price;
        $early_price         = $this->early_price;
        $ticket_price_idr    = number_format($ticket_price, 0);
        $early_price_idr     = number_format($early_price, 0);
        $admin_fee           = $this->admin_fee;
        $admin_fee_idr       = number_format($admin_fee, 0);
        $total_price         = $ticket_price + $admin_fee;
        $total_price_idr     = number_format($total_price, 0);
        $no_rekening         = $this->no_rekening;
        $bank_rekening       = $this->bank_rekening;
        $nama_rekening       = $this->nama_rekening;
        $wa_pic              = $this->wa_pic;
        $registration_status = $this->registration_status;

        $early_bird_start = $this->early_bird_start->format('F d, Y');
        $early_bird_end   = $this->early_bird_end->format('F d, Y');
        $reguler_start    = $this->reguler_start->format('F d, Y');
        $reguler_end      = $this->reguler_end->format('F d, Y');

        $data = [
            'event_name'          => $event_name,
            'event_date'          => $event_date,
            'event_time'          => $event_time,
            'location_name'       => $location_name,
            'location_address'    => $location_address,
            'google_maps_url'     => $google_maps_url,
            'google_maps_embed'   => $google_maps_embed,
            'ticket_price_idr'    => $ticket_price_idr,
            'early_price_idr'     => $early_price_idr,
            'admin_fee_idr'       => $admin_fee_idr,
            'total_price_idr'     => $total_price_idr,
            'no_rekening'         => $no_rekening,
            'bank_rekening'       => $bank_rekening,
            'nama_rekening'       => $nama_rekening,
            'wa_pic'              => $wa_pic,
            'registration_status' => $registration_status,
            'early_bird_start'    => $early_bird_start,
            'early_bird_end'      => $early_bird_end,
            'reguler_start'       => $reguler_start,
            'reguler_end'         => $reguler_end,
        ];

        return view('register_apjii_golf_tournament', $data);
    }

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

    protected function registration_status()
    {
        return RegistrationStatus::find(1) ? RegistrationStatus::find(1)->is_active : false;
    }
}
