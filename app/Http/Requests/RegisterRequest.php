<?php

namespace App\Http\Requests;

use App\Models\PromoCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use App\Rules\IndonesiaPhoneProviderRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    // protected $stopOnFirstFailure = true;

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
            'first_name'      => 'required',
            'last_name'       => 'required',
            'gender'          => 'required',
            'email'           => ['required', 'email:rfc:dns'],
            'whatsapp_number' => ['required', new IndonesiaPhoneProviderRule],
            'company_name'    => 'required',
            'position'        => 'required',
            'institution'     => 'required',
            'institution_etc' => 'required_if:institution,etc',
            'shirt_size'      => 'required',
            'handicap'        => ['required', 'integer'],
            'code'            => ['nullable', function ($attribute, $value, $fail) {
                if ($value) {
                    $promo_code = PromoCode::where('code', $value)->first();
                    if (!$promo_code) {
                        return $fail('Promo Code not found, please check again');
                    }

                    if ($promo_code->is_used) {
                        return $fail('Promo Code already used');
                    }
                }
            }],
            'g-recaptcha-response' => ['required', 'recaptchav3:register,0.5'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required'               => 'The first name field is required.',
            'last_name.required'               => 'The first name field is required.',
            'gender.required'                  => 'The gender field is required.',
            'email.required'                   => 'The email field is required.',
            'email.email'                      => 'The email must be a valid email address.',
            'email.unique'                     => 'The email has already been taken.',
            'whatsapp_number.required'         => 'The WhatsApp number field is required.',
            'company_name.required'            => 'The company name field is required.',
            'position.required'                => 'The position field is required.',
            'institution.required'             => 'The institution field is required.',
            'institution_etc.required_unless'  => 'The institution etc field is required when institution is not "Etc".',
            'shirt_size.required'              => 'Please select your polo shirt size.',
            'handicap.required'                => 'Please enter your handicap.',
            'handicap.integer'                 => 'The handicap must be an integer.',
            'code.exists'                      => 'Promo Code not found, please check again',
            'g-recaptcha-response.recaptchav3' => 'Google reCAPTCHA verification failed. Please refresh the page and try again.',
        ];
    }

    // public function response(array $errors)
    // {
    //     return new JsonResponse([
    //         'status' => false,
    //         'errors' => $errors
    //     ], 422);
    // }
}
