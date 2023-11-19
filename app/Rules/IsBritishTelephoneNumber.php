<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsBritishTelephoneNumber implements ValidationRule
{
    const REGEX = '/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/';

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (preg_match(static::REGEX, strval($value))) {
            return;
        }

        $fail('The :attribute must be in a valid British telephone number.');
    }
}
