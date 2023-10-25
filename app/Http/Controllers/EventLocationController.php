<?php

namespace App\Http\Controllers;

use App\Models\EventLocation;
use App\Models\Location;
use Illuminate\Http\Request;

class EventLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = EventLocation::orderBy('start_date', 'desc')->get();

        $data = [
            'page_title' => 'Event Location',
            'lists'      => $lists,
        ];
        return view('pages.admin.event_location.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $locations = Location::orderBy('name', 'asc')->get();
        $data = [
            'page_title' => 'Event Location | Create',
            'locations'  => $locations,
        ];
        return view('pages.admin.event_location.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_id' => 'required',
            'start_date'  => 'required',
        ]);

        EventLocation::create([
            'location_id' => $request->location_id,
            'start_date'  => $request->start_date,
        ]);

        return redirect()->route('admin.event_location')->with('success', 'Create Success');
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
        $locations = Location::orderBy('name', 'asc')->get();
        $lists     = EventLocation::findOrFail($id);
        $data      = [
            'page_title' => 'Event Location | Edit',
            'locations'  => $locations,
            'lists'      => $lists,
        ];
        return view('pages.admin.event_location.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'location_id' => 'required',
            'start_date'  => 'required',
        ]);

        $exec              = EventLocation::find($id);
        $exec->location_id = $request->location_id;
        $exec->start_date  = $request->start_date;
        $exec->save();

        return redirect()->route('admin.event_location')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec = EventLocation::findOrFail($id);
        $exec->delete();

        return redirect()->route('admin.event_location')->with('success', 'Destroy Success');
    }
}
