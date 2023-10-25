<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Location::orderBy('name', 'asc')->get();

        $data = [
            'page_title' => 'Master Location',
            'lists'      => $lists,
        ];
        return view('pages.admin.master_location.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'Master Location | Create',
        ];
        return view('pages.admin.master_location.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'contact' => 'required',
            'out'     => 'required',
            'in'      => 'required',
            'banner'  => 'required',
        ]);

        $banner = Storage::disk('public')->put('banner', $request->file('banner'));

        Location::create([
            'name'    => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'out'     => $request->out,
            'in'      => $request->in,
            'banner'  => $banner,
        ]);

        return redirect()->route('admin.master_location')->with('success', 'Create Success');
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
        $lists       = Location::findOrFail($id);
        $data        = [
            'page_title' => 'Master Location | Edit',
            'lists'      => $lists,
        ];
        return view('pages.admin.master_location.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'    => 'required',
            'address' => 'required',
            'contact' => 'required',
            'out'     => 'required',
            'in'      => 'required',
            'banner'  => 'nullable',
        ]);

        $exec = Location::find($id);
        $exec->name = $request->name;
        $exec->address = $request->address;
        $exec->contact = $request->contact;
        $exec->out = $request->out;
        $exec->in = $request->in;

        if ($request->hasFile('banner')) {
            $banner       = Storage::disk('public')->put('banner', $request->file('banner'));
            $exec->banner = $banner;
        }

        $exec->save();

        return redirect()->route('admin.master_location')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec = Location::findOrFail($id);
        $exec->delete();

        return redirect()->route('admin.master_location')->with('success', 'Destroy Success');
    }
}
