<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\EventLocation;
use App\Models\Registration;

class CountController extends Controller
{
    public function index()
    {
        $count_admin          = User::count();
        $count_location       = Location::count();
        $count_event_location = EventLocation::count();
        $count_player         = Player::count();

        $apjii_7 = Registration::get();

        foreach ($apjii_7 as $a) {
            $count_apjii_7_register   = $a->count();
            $count_apjii_7_pending    = $a->where('payment_status', 'pending')->count();
            $count_apjii_7_paid       = $a->where('payment_status', 'success')->count();
            $count_apjii_7_expired    = $a->where('payment_status', 'expired')->count();
            $count_apjii_7_checkin    = $a->where('is_checkin', true)->count();
            $count_apjii_7_shirt_xs   = $a->where('payment_status', 'success')->where('shirt_size', 'xs')->count();
            $count_apjii_7_shirt_s    = $a->where('payment_status', 'success')->where('shirt_size', 's')->count();
            $count_apjii_7_shirt_m    = $a->where('payment_status', 'success')->where('shirt_size', 'm')->count();
            $count_apjii_7_shirt_l    = $a->where('payment_status', 'success')->where('shirt_size', 'l')->count();
            $count_apjii_7_shirt_xl   = $a->where('payment_status', 'success')->where('shirt_size', 'xl')->count();
            $count_apjii_7_shirt_xxl  = $a->where('payment_status', 'success')->where('shirt_size', 'xxl')->count();
            $count_apjii_7_shirt_xxxl = $a->where('payment_status', 'success')->where('shirt_size', 'xxxl')->count();
        }

        $apjii7_checked = Registration::where('is_checkin', true)->orderBy('updated_at', 'desc')->get();

        $data = [
            'count_admin'              => $count_admin,
            'count_location'           => $count_location,
            'count_event_location'     => $count_event_location,
            'count_player'             => $count_player,
            'count_apjii_7_register'   => $count_apjii_7_register,
            'count_apjii_7_pending'    => $count_apjii_7_pending,
            'count_apjii_7_paid'       => $count_apjii_7_paid,
            'count_apjii_7_expired'    => $count_apjii_7_expired,
            'count_apjii_7_checkin'    => $count_apjii_7_checkin,
            'count_apjii_7_shirt_xs'   => $count_apjii_7_shirt_xs,
            'count_apjii_7_shirt_s'    => $count_apjii_7_shirt_s,
            'count_apjii_7_shirt_m'    => $count_apjii_7_shirt_m,
            'count_apjii_7_shirt_l'    => $count_apjii_7_shirt_l,
            'count_apjii_7_shirt_xl'   => $count_apjii_7_shirt_xl,
            'count_apjii_7_shirt_xxl'  => $count_apjii_7_shirt_xxl,
            'count_apjii_7_shirt_xxxl' => $count_apjii_7_shirt_xxxl,
            'apjii7_checked'           => $apjii7_checked,
        ];

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}
