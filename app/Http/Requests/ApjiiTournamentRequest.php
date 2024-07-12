<?php

namespace App\Http\Requests;

use App\Rules\IndonesiaPhoneProviderRule;
use Illuminate\Foundation\Http\FormRequest;

class ApjiiTournamentRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name'       => 'required',
            'gender'          => 'required',
            'email'           => 'required|email:rfc:dns',
            'whatsapp_number' => ['required', new IndonesiaPhoneProviderRule],
            'company_name'    => 'required',
            'position'        => 'required',
            'institution'     => 'required',
            'institution_etc' => 'nullable',
        ];
    }
}
