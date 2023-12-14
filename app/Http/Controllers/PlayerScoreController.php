<?php

namespace App\Http\Controllers;

use App\Models\EventLocation;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\PlayerHistory;

class PlayerScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = PlayerHistory::with([
            'player',
            'event_location',
            'event_location.location',
        ])->orderBy('created_at', 'desc')->get();

        $data = [
            'page_title' => 'Player Score',
            'lists'      => $lists,
        ];
        return view('pages.admin.player_score.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $events = EventLocation::select([
            'event_locations.id',
            'locations.name',
        ])
            ->leftJoin('locations', 'locations.id', '=', 'event_locations.location_id')
            ->where('event_locations.is_active', 1)
            ->orderBy('locations.id', 'desc')
            ->get();

        $players = Player::orderBy('name', 'asc')->get();
        $data = [
            'page_title' => 'Player Management | Create',
            'events'     => $events,
            'players'    => $players,
        ];
        return view('pages.admin.player_score.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_location_id' => 'required',
            'player_id'         => 'required',
            'tee_off'           => 'required',
            'out'               => 'required',
            'in'                => 'required',
            'gross'             => 'required',
            'handicap'          => 'required',
            'net'               => 'required',
        ]);

        PlayerHistory::create([
            'player_id'         => $request->player_id,
            'event_location_id' => $request->event_location_id,
            'tee_off'           => $request->tee_off,
            'out'               => $request->out,
            'in'                => $request->in,
            'gross'             => $request->gross,
            'handicap'          => $request->handicap,
            'net'               => $request->net,
        ]);

        $recap = PlayerHistory::where('player_id', $request->player_id)->get();

        $c = $recap->count();
        $g = 0;
        $h = 0;
        $n = 0;
        foreach ($recap as $r) {
            $g = $g + $r->gross;
            $h = $h + $r->handicap;
            $n = $n + $r->net;
        }

        if ($c > 0) {
            $g = $g / $c;
            $h = $h / $c;
            $n = $g - $h;
        }

        $exec = Player::find($request->player_id);
        $exec->increment('total_play', 1);
        $exec->gross    = $g;
        $exec->handicap = $h;
        $exec->net      = $n;
        $exec->save();

        return redirect()->route('admin.player_score.create')->with('success', 'Create Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lists = PlayerHistory::findOrFail($id);
        $events = EventLocation::select([
            'event_locations.id',
            'locations.name',
        ])
            ->leftJoin('locations', 'locations.id', '=', 'event_locations.location_id')
            ->orderBy('locations.name', 'asc')
            ->get();

        $players = Player::orderBy('name', 'asc')->get();
        $data = [
            'page_title' => 'Player Management | Create',
            'events'     => $events,
            'players'    => $players,
            'lists'      => $lists,
        ];
        return view('pages.admin.player_score.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'event_location_id' => 'required',
            'player_id'         => 'required',
            'tee_off'           => 'required',
            'out'               => 'required',
            'in'                => 'required',
            'gross'             => 'required',
            'handicap'          => 'required',
            'net'               => 'required',
        ]);

        $exec                    = PlayerHistory::find($id);
        $exec->event_location_id = $request->event_location_id;
        $exec->player_id         = $request->player_id;
        $exec->tee_off           = $request->tee_off;
        $exec->out               = $request->out;
        $exec->in                = $request->in;
        $exec->gross             = $request->gross;
        $exec->handicap          = $request->handicap;
        $exec->net               = $request->net;
        $exec->save();

        return redirect()->route('admin.player_score')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec = PlayerHistory::findOrFail($id);
        $exec->delete();

        return redirect()->route('admin.player_score')->with('success', 'Destroy Success');
    }
}
