<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function checkin()
    {
        $page_title = "Apjii 7 Tournament - Checkin";

        $data = [
            'page_title' => $page_title,
        ];
        return view('pages.admin.tournament.checkin', $data);
    }

    public function checkin_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barcode' => ['required', 'exists:registrations,barcode'],
        ], [
            'barcode.required' => 'The barcode field is required.',
            'barcode.exists'   => 'The barcode is not registered or payment expired.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $registration = Registration::where('barcode', $request->barcode)->first();

        if (in_array($registration->payment_status, ['pending', 'expired'])) {
            return response()->json([
                'message' => "The barcode is not registered or payment expired.",
            ], 400);
        }

        $registration->is_checkin = 1;
        $registration->save();

        return response()->json([
            'message' => $registration->full_name . ' Checkin Successful',
        ], 200);
    }
}
