<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'           => 'required|email:rfc:dns|unique:registrations',
            'whatsapp_number' => 'required',
            'company_name'    => 'required',
            'position'        => 'required',
            'institution'     => 'required',
            'institution_etc' => 'required_unless:institution_etc,Etc',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'The full name field is required.',
            'gender.required' => 'The gender field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'whatsapp_number.required' => 'The WhatsApp number field is required.',
            'company_name.required' => 'The company name field is required.',
            'position.required' => 'The position field is required.',
            'institution.required' => 'The institution field is required.',
            'institution_etc.required_unless' => 'The institution etc field is required when institution is not "Etc".',
        ];
    }

    public function response(array $errors)
    {
        return new JsonResponse([
            'status' => false,
            'errors' => $errors
        ], 422);
    }
}
