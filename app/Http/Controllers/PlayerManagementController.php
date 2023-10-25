<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Player::orderBy('name', 'asc')->get();

        $data = [
            'page_title' => 'Player Management',
            'lists'      => $lists,
        ];
        return view('pages.admin.player_management.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Player::orderBy('name', 'asc')->get();
        $data = [
            'page_title' => 'Player Management | Create',
            'locations'  => $locations,
        ];
        return view('pages.admin.player_management.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $late = Player::orderBy('seq', 'desc')->limit(1)->first();
        $seq  = $late->seq + 1;

        if ($seq < 10) {
            $unique = "00" . $seq;
        } elseif ($seq < 100) {
            $unique = "0" . $seq;
        }

        $code = "PGA" . $unique;

        Player::create([
            'name' => $request->name,
            'seq'  => $seq,
        ]);

        return redirect()->route('admin.player_management')->with('success', 'Create Success');
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
        $lists     = Player::findOrFail($id);
        $data      = [
            'page_title' => 'Player Management | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.player_management.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $exec       = Player::find($id);
        $exec->name = $request->name;
        $exec->save();

        return redirect()->route('admin.player_management')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec = Player::findOrFail($id);
        $exec->delete();

        return redirect()->route('admin.player_management')->with('success', 'Destroy Success');
    }
}
