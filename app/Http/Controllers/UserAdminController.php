<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = User::orderBy('username', 'asc')->get();

        $data = [
            'page_title' => 'User Management | Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'page_title' => 'User Management | Create Admin',
        ];
        return view('pages.admin.user.admin.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username',
            'email'    => 'required',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('admin.admin')->with('success', 'Create Success');
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
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Edit Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.form_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required',
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($id == Auth::user()->id) {
            Auth::user()->name  = $request->name;
            Auth::user()->email = $request->email;
        }

        return redirect()->route('admin.admin')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exec             = User::findOrFail($id);
        $exec->deleted_by = Auth::user()->id;
        $exec->save();
        $exec->delete();

        return redirect()->route('admin.admin')->with('success', 'Destroy Success');
    }

    /**
     * Show the form for reset password.
     */
    public function reset(string $id)
    {
        $lists       = User::findOrFail($id);
        $data        = [
            'page_title' => 'User Management | Reset Password Admin',
            'lists'      => $lists,
        ];
        return view('pages.admin.user.admin.form_reset', $data);
    }

    public function reset_password(Request $request, string $id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        User::where('id', $id)->update([
            'password'   => $request->password,
        ]);

        return redirect()->route('admin.admin')->with('success', 'Reset Success');
    }
}
