<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Exception;
use App\Models\Player;
use App\Models\Undian;
use Illuminate\Http\Request;
use App\Models\EventLocation;
use App\Models\PlayerHistory;
use App\Models\Registration;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Http;
use Midtrans\Config;
use Midtrans\Snap;

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
        $this->location_name    = 'Club Bogor Raya';
        $this->location_address = 'Perumahan Jl. Danau Bogor Raya No.16143, Katulampa, Kec. Bogor Tim., Kota Bogor, Jawa Barat 16143';
        $this->event_date       = Carbon::parse('2023-11-24');
        $this->event_time       = '08:00 till end';
        $this->ticket_price     = 1000000;
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
        return view('pairing');
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

    public function register_store(RegisterRequest $request)
    {
        try {
            // $request->validate([
            //     'full_name'       => 'required',
            //     'gender'          => 'required',
            //     'email'           => 'required|email:rfc:dns|unique:registrations',
            //     'whatsapp_number' => 'required',
            //     'company_name'    => 'required',
            //     'position'        => 'required',
            //     'institution'     => 'required',
            //     'institution_etc' => 'required_unless:institution_etc,Etc',
            // ], [
            //     'email.unique' => 'The Email already taken.'
            // ]);

            $current_env = config('app.env') ?? 'local';
            $order_id    = uniqid("APJ-", true);

            $url_pay = "https://app.sandbox.midtrans.com/snap/v1/transactions";
            if ($current_env == "production") {
                $url_pay = "https://app.midtrans.com/snap/v1/transactions";
            }

            $gross_amount = $this->ticket_price + $this->admin_fee;

            $transaction_info = [
                "transaction_details" => [
                    "order_id"     => $order_id,
                    "gross_amount" => $gross_amount
                ],
                "item_details" => [
                    [
                        "id"       => 1,
                        "price"    => $this->ticket_price,
                        "quantity" => 1,
                        "name"     => "E-Ticket PGA GOBAR Series - Club Bogor Raya",
                    ],
                    [
                        "id"       => 9999,
                        "price"    => $this->admin_fee,
                        "quantity" => 1,
                        "name"     => "Admin Fee Registration PGA Golf - Club Bogor Raya",
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

            $exec = Registration::create([
                'full_name'       => $request->full_name,
                'gender'          => $request->gender,
                'email'           => $request->email,
                'whatsapp_number' => $request->whatsapp_number,
                'company_name'    => $request->company_name,
                'position'        => $request->position,
                'institution'     => $request->institution,
                'institution_etc' => $request->institution_etc,
                'order_id'        => $order_id,
                'payment_status'  => 0,
                'snap_token'      => $snap_token,
            ]);

            return response()->json([
                'success'    => true,
                'data'       => $exec,
                'snap_token' => $snap_token,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function register_check(Request $request)
    {
        $location_name = $this->location_name;
        return view('register_check', compact('location_name'));
    }

    public function register_status(Request $request)
    {
        $email = $request->email;
        $exec = Registration::where('email', $email)->first();
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
        $exec = Registration::where('order_id', $order_id)->where('payment_status', 1)->first();
        if (!$exec) {
            return abort(404, 'Data Not Found');
        }

        $location_name = $this->location_name;
        return view('register_success', compact('location_name'));
    }
}
