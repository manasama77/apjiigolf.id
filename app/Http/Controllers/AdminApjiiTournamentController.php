<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;

class AdminApjiiTournamentController extends Controller
{
    public function index()
    {
        $page_title = "Apjii 7 Tournament";

        $registrations = Registration::orderBy('created_at', 'desc')->get();

        $data = [
            'page_title'    => $page_title,
            'registrations' => $registrations,
        ];
        return view('pages.admin.tournament.main', $data);
    }
}
