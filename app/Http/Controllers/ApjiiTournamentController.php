<?php

namespace App\Http\Controllers;

use Exception;
use Ramsey\Uuid\Uuid;
use App\Mail\InvoiceMail;
use Illuminate\Support\Str;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\EventLocation;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\RegistrationStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApjiiTransactionExpired;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;

class ApjiiTournamentController extends Controller
{
    private $event_name;
    private $event_date;
    private $event_time;
    private $location_name;
    private $location_address;
    private $google_maps_url;
    private $google_maps_embed;
    private $reguler_price;
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
    private $payment_url;
    private $status_url;
    private $ticket_type;
    private $client_id;
    private $secret_key;

    public function __construct()
    {
        $this->event_name          = 'APJII GOLF TOURNAMENT 7';
        $this->event_date          = Carbon::parse('2024-08-25');
        $this->event_time          = '06:00 till end';
        $this->location_name       = 'Pondok Indah Golf Course';
        $this->location_address    = 'Jl. Metro Pondok Indah No.16, RT.1/RW.16, Pd. Pinang, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12310';
        $this->google_maps_url     = "https://maps.app.goo.gl/zCLyP7rDaVCm3HoN8";
        $this->google_maps_embed   = "https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15863.835569909455!2d106.7849619!3d-6.2691368!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a490b60e41%3A0xaf08accee7decdf8!2sPondok%20Indah%20Golf%20Course!5e0!3m2!1sen!2sid!4v1720757045886!5m2!1sen!2sid";
        $this->early_price         = 3_500_000;
        $this->reguler_price       = 3_750_000;
        $this->admin_fee           = 0;
        $this->no_rekening         = "6630306017";
        $this->bank_rekening       = "BCA";
        $this->nama_rekening       = "Victor Henry Raymond";
        $this->wa_pic              = '628569016901';
        $this->registration_status = $this->registration_status();
        $this->early_bird_start    = Carbon::parse('2024-07-21');
        $this->early_bird_end      = Carbon::parse('2024-08-05');
        $this->reguler_start       = Carbon::parse('2024-08-06');
        $this->reguler_end         = Carbon::parse('2024-08-10');

        $this->payment_url = "https://api-sandbox.doku.com/checkout/v1/payment";
        $this->status_url = "https://api-sandbox.doku.com/orders/v1/status";
        $this->client_id   = config('doku.client_id_sandbox');
        $this->secret_key  = config('doku.secret_key_sandbox');
        if (env('APP_ENV') == 'production') {
            $this->payment_url = 'https://api.doku.com/checkout/v1/payment';
            $this->status_url = "https://api.doku.com/orders/v1/status";
            $this->client_id   = config('doku.client_id');
            $this->secret_key  = config('doku.secret_key');
        }

        $this->ticket_type = 'reguler';
        if (Carbon::now() >= $this->early_bird_start && Carbon::now() <= $this->early_bird_end) {
            $this->ticket_type = 'early bird';
        }
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
        $reguler_price       = $this->reguler_price;
        $early_price         = $this->early_price;
        $reguler_price_idr   = number_format($reguler_price, 0);
        $early_price_idr     = number_format($early_price, 0);
        $admin_fee           = $this->admin_fee;
        $admin_fee_idr       = number_format($admin_fee, 0);
        $total_price         = $reguler_price + $admin_fee;
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
            'reguler_price_idr'   => $reguler_price_idr,
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

    public function store(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $order_id = $this->generate_order_id();
            // $order_id = 'mtRPwJ3hHVsKbrid';

            $invoice_array  = $this->generate_invoice_number();
            $invoice_number = $invoice_array['invoice_number'];

            $full_name       = $request->full_name;
            $gender          = $request->gender;
            $email           = $request->email;
            $whatsapp_number = $request->whatsapp_number;
            $company_name    = $request->company_name;
            $position        = $request->position;
            $institution     = $request->institution;
            $institution_etc = $request->institution_etc;
            $shirt_size      = $request->shirt_size;

            $event_location = EventLocation::with([
                'location'
            ])->where('is_active', 1)->first();
            if (!$event_location) {
                throw new Exception('No event active. Please contact admin for more information at contact +6282114578976.');
            }
            $event_location_id = $event_location->id;

            $ticket_type  = $this->ticket_type;
            $ticket_price = ($this->ticket_type == 'reguler') ? $this->reguler_price : $this->early_price;
            $admin_fee    = $this->admin_fee;
            $total_price  = $ticket_price + $admin_fee;

            $payment_status = 'pending';
            $barcode        = $this->generate_barcode(6);
            $seq            = $invoice_array['seq'];

            $exec = Registration::create([
                'order_id'          => $order_id,
                'invoice_number'    => $invoice_number,
                'full_name'         => $request->full_name,
                'gender'            => $request->gender,
                'email'             => $request->email,
                'whatsapp_number'   => $request->whatsapp_number,
                'company_name'      => $request->company_name,
                'position'          => $request->position,
                'institution'       => $request->institution,
                'institution_etc'   => $request->institution_etc,
                'shirt_size'        => $request->shirt_size,
                'event_location_id' => $event_location_id,
                'ticket_type'       => $ticket_type,
                'ticket_price'      => $ticket_price,
                'admin_fee'         => $this->admin_fee,
                'total_price'       => $ticket_price + $this->admin_fee,
                'payment_status'    => $payment_status,
                'barcode'           => $barcode,
                'seq'               => $seq,
                'eticket'           => null,
            ]);

            if (!$exec) {
                throw new Exception("Failed to register. Please contact admin for more information at contact +6282114578976.");
            }

            $register_id   = $exec->id;
            $doku_checkout = $this->doku_checkout($order_id, $total_price, $invoice_number, $register_id, $full_name, $whatsapp_number, $email);

            if ($doku_checkout->failed()) {
                throw new Exception("Failed to register. Please contact admin for more information at contact +6282114578976.");
            }

            $responses    = $doku_checkout->json();
            $token_id     = $responses['response']['payment']['token_id'];
            $url          = $responses['response']['payment']['url'];
            $expired_date = $responses['response']['payment']['expired_date'];

            $exec->update([
                'token_id'     => $token_id,
                'url'          => $url,
                'expired_date' => $expired_date,
            ]);

            $time_expired = Carbon::parse($expired_date)->format('Y-m-d H:i:s');

            // create invoice pdf
            $data_pdf_invoice = [
                'player_name'      => $request->full_name,
                'invoice_number'   => $invoice_number,
                'invoice_date'     => Carbon::now()->format('d M Y'),
                'event_name'       => $this->event_name,
                'location_name'    => $this->location_name,
                'location_address' => $this->location_address,
                'event_date'       => $this->event_date->format('d M Y'),
                'ticket_price'     => $ticket_price,
                'admin_fee'        => $this->admin_fee,
                'grand_total'      => $ticket_price + $this->admin_fee,
            ];
            $pdf = Pdf::loadView('layouts.invoice', $data_pdf_invoice)->setPaper('A4', 'portrait');
            // return $pdf->stream('test.pdf', array("Attachment" => false));

            Storage::disk('public')->put('invoice/' . $invoice_number . '.pdf', $pdf->output());

            // debug purpose
            // return (new InvoiceMail($exec, $this->event_name, $url, $time_expired))->render();
            Mail::to($request->email)->bcc([
                'adam.pm77@gmail.com',
                'victormalawau@gmail.com',
                'betharifarisha@gmail.com',
            ])->send(new InvoiceMail($exec, $this->event_name, $url, $time_expired));

            DB::commit();
            return redirect()->route('register_status', [$exec->id]);
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    protected function registration_status()
    {
        return RegistrationStatus::find(1) ? RegistrationStatus::find(1)->is_active : false;
    }

    protected function generate_barcode(int $length = 64, string $keyspace = '123456789'): string
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

    protected function generate_order_id()
    {
        return Uuid::uuid4()->toString();
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
        $random = rand(1, 9999);

        $invoice_number = $prefix . "-" . $year . $month . str_pad($seq, 4, '0', STR_PAD_LEFT) . $random;

        return [
            'invoice_number' => $invoice_number,
            'seq'            => $seq,
        ];
    }

    protected function doku_checkout($order_id, $total_price, $invoice_number, $register_id, $full_name, $whatsapp_number, $email)
    {
        // adam
        $request_timestamp = Carbon::now('UTC')->toIso8601ZuluString();

        $order_object = [
            'amount'                => $total_price,
            'invoice_number'        => $invoice_number,
            'currency'              => 'IDR',
            'callback_url'          => route('register_status', $register_id),
            'callback_url_cancel'   => route('register_cancel', $register_id),
            'callback_url_result'   => route('register_success', $register_id),
            'language'              => 'EN',
            'auto_redirect'         => true,
            'disable_retry_payment' => true,
            'line_items'            => [
                [
                    'id'       => 1,
                    'name'     => 'Registration APJII Golf 7 Tournament',
                    'price'    => $total_price,
                    'quantity' => 1,
                    'category' => 41,
                ]
            ]
        ];

        $payment_object = [
            'payment_due_date' => 60,
            // "payment_method_types" => [
            //     "VIRTUAL_ACCOUNT_BCA",
            //     "VIRTUAL_ACCOUNT_BANK_MANDIRI",
            //     "VIRTUAL_ACCOUNT_BANK_SYARIAH_MANDIRI",
            //     "VIRTUAL_ACCOUNT_DOKU",
            //     "VIRTUAL_ACCOUNT_BRI",
            //     "VIRTUAL_ACCOUNT_BNI",
            //     "VIRTUAL_ACCOUNT_BANK_PERMATA",
            //     "VIRTUAL_ACCOUNT_BANK_CIMB",
            //     "VIRTUAL_ACCOUNT_BANK_DANAMON",
            //     "ONLINE_TO_OFFLINE_ALFA",
            //     "CREDIT_CARD",
            //     "DIRECT_DEBIT_BRI",
            //     "EMONEY_SHOPEEPAY",
            //     "EMONEY_OVO",
            //     "QRIS",
            //     "PEER_TO_PEER_AKULAKU",
            // ]
        ];

        $customer_object = [
            "id"      => $register_id,
            "name"    => $full_name,
            "email"   => $email,
            "phone"   => $whatsapp_number,
            "address" => '-',
            "country" => "ID"
        ];

        $body_request = [
            'order'    => $order_object,
            'payment'  => $payment_object,
            'customer' => $customer_object,
        ];

        $digestSHA256  = hash('sha256', json_encode($body_request), true);
        $digestBase64 = base64_encode($digestSHA256);

        $componentSignature = "Client-Id:" . $this->client_id . "\n" .
            "Request-Id:" . $order_id . "\n" .
            "Request-Timestamp:" . $request_timestamp . "\n" .
            "Request-Target:/checkout/v1/payment" . "\n" .
            "Digest:" . $digestBase64;

        $signature = "HMACSHA256=" . base64_encode(hash_hmac('sha256', $componentSignature, $this->secret_key, true));

        return Http::withHeaders([
            'Client-Id'         => $this->client_id,
            'Request-Id'        => $order_id,
            'Request-Timestamp' => $request_timestamp,
            'Signature'         => $signature,
        ])->post($this->payment_url, $body_request);
    }

    public function status($id)
    {
        $reg = Registration::find($id);

        if (!$reg) {
            return abort(404);
        }

        if ($reg->payment_status == 'expired') {
            return redirect(route('register_cancel', $id));
        }

        if ($reg->payment_status == 'success') {
            return redirect(route('register_success', $id));
        }

        $event_name        = $this->event_name;
        $event_date        = $this->event_date;
        $event_time        = $this->event_time;
        $location_name     = $this->location_name;
        $location_address  = $this->location_address;
        $google_maps_url   = $this->google_maps_url;
        $google_maps_embed = $this->google_maps_embed;

        $data = [
            'reg'               => $reg,
            'event_name'        => $event_name,
            'event_date'        => $event_date,
            'event_time'        => $event_time,
            'location_name'     => $location_name,
            'location_address'  => $location_address,
            'google_maps_url'   => $google_maps_url,
            'google_maps_embed' => $google_maps_embed,
        ];

        return view('status_apjii_golf_tournament', $data);
    }

    public function success($id)
    {
        $reg = Registration::find($id);

        if (!$reg) {
            return abort(404);
        }

        $event_name        = $this->event_name;
        $event_date        = $this->event_date;
        $event_time        = $this->event_time;
        $location_name     = $this->location_name;
        $location_address  = $this->location_address;
        $google_maps_url   = $this->google_maps_url;
        $google_maps_embed = $this->google_maps_embed;

        $data = [
            'reg'               => $reg,
            'event_name'        => $event_name,
            'event_date'        => $event_date,
            'event_time'        => $event_time,
            'location_name'     => $location_name,
            'location_address'  => $location_address,
            'google_maps_url'   => $google_maps_url,
            'google_maps_embed' => $google_maps_embed,
        ];

        return view('success_apjii_golf_tournament', $data);
    }

    public function download($id)
    {
        $reg = Registration::find($id);

        if (!$reg) {
            return abort(404);
        }

        return Storage::download('eticket/apjii-golf-tournament-7/' . $reg->eticket);
    }

    public function check(Request $request)
    {
        return view('check_apjii_golf_tournament');
    }

    public function find(Request $request)
    {
        try {
            $regs = Registration::where('email', $request->email)->get();

            if ($regs->count() == 0) {
                throw new Exception('Email not found');
            }

            $data = [
                'regs' => $regs,
            ];

            return view('find_apjii_golf_tournament', $data);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function cancel($id)
    {
        $reg = Registration::find($id);

        if (!$reg) {
            return abort(404);
        }

        $event_name        = $this->event_name;
        $event_date        = $this->event_date;
        $event_time        = $this->event_time;
        $location_name     = $this->location_name;
        $location_address  = $this->location_address;
        $google_maps_url   = $this->google_maps_url;
        $google_maps_embed = $this->google_maps_embed;

        $data = [
            'reg'               => $reg,
            'event_name'        => $event_name,
            'event_date'        => $event_date,
            'event_time'        => $event_time,
            'location_name'     => $location_name,
            'location_address'  => $location_address,
            'google_maps_url'   => $google_maps_url,
            'google_maps_embed' => $google_maps_embed,
        ];

        return view('cancel_apjii_golf_tournament', $data);
    }

    public function test()
    {
        Log::info("A");
        dd("A");
        dump(config('mail.default'), config('mail.from.address'));
        $exec = Registration::find(1);
        $time_expired = Carbon::parse($exec->expired_date)->format('Y-m-d H:i:s');

        return Mail::to('adam.pm77@gmail.com')->bcc([
            'adam.pm59@gmail.com',
        ])->send(new InvoiceMail($exec, $this->event_name, 'https://google.com', $time_expired));
    }
}
