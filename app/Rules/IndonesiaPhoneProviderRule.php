<?php

namespace App\Rules;

use App\Models\IndonesiaProvider;
use Closure;
use Illuminate\Support\Str;
use Illuminate\Contracts\Validation\ValidationRule;

class IndonesiaPhoneProviderRule implements ValidationRule
{
    /**
     * Indicates whether the rule should be implicit.
     *
     * @var bool
     */
    public $implicit = true;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $prefix = Str::substr($value, 0, 4);
        $provider_check = IndonesiaProvider::where('prefix', '=', $prefix)->get();

        if ($provider_check->count() == 0) {
            $fail($prefix . ' is not a valid Indonesia phone number prefix.');
        }
    }
}
