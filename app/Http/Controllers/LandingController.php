<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\EventLocation;
use App\Models\PlayerHistory;
use App\Models\Undian;
use Illuminate\Database\Eloquent\Builder;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $page_title = "Standing";

        $tp = $request->tp ?? "desc";
        $g  = $request->g ?? "asc";
        $h  = $request->h ??  "asc";
        $n  = $request->n ?? "asc";

        $players = Player::orderBy("total_play", $tp)->orderBy("gross", $g)->orderBy("handicap", $h)->orderBy("net", $n)->get();


        $data = [
            'page_title' => $page_title,
            'tp'         => $tp,
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
            'page_title' => $page_title,
            'players'    => $players,
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
}
