<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Player;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\EventLocation;

class CountController extends Controller
{
    public function index()
    {
        $count_admin          = User::count();
        $count_location       = Location::count();
        $count_event_location = EventLocation::count();
        $count_player         = Player::count();

        $data = [
            'count_admin'          => $count_admin,
            'count_location'       => $count_location,
            'count_event_location' => $count_event_location,
            'count_player'         => $count_player,
        ];

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}
