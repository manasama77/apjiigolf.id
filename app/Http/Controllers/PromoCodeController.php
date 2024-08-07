<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = PromoCode::latest()->get();

        $data = [
            'page_title' => 'Promo Code',
            'lists'      => $lists,
        ];
        return view('pages.admin.promo_code.main', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $code = $this->generate_promo_code();
        $data = [
            'page_title' => 'Promo Code | Create',
            'code'       => $code,
        ];
        return view('pages.admin.promo_code.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'unique:promo_codes,code'],
            'name' => 'required',
            'tipe' => ['required', 'in:promo,compliment'],
        ]);

        // append to $request
        $request->merge(['is_used' => false]);

        PromoCode::create($request->only('code', 'name', 'tipe', 'is_used'));

        return redirect()->route('admin.promo_code')->with('success', 'Create Success for Promo Code ' . $request->code);
    }

    /**
     * Display the specified resource.
     */
    public function show(PromoCode $promoCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PromoCode $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PromoCode $promoCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PromoCode $promoCode)
    {
        $promoCode->delete();
        return redirect()->route('admin.promo_code')->with('success', 'Delete Success');
    }

    protected function generate_promo_code()
    {
        do {
            $generated_code = strtoupper(Str::random(6));
        } while (PromoCode::where('code', $generated_code)->exists());

        return $generated_code;
    }
}
