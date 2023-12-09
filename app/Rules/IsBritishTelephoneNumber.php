<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsBritishTelephoneNumber implements ValidationRule
{
    const PATTERN = '/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/';

    public function validate(string $attribute, $value, Closure $fail): void
    {
        if (
            ! is_scalar($value)
            || ! preg_match(self::PATTERN, $this->normalizeValue($value))
        ) {
            $fail('The :attribute must be a valid British telephone number.');
        }
    }

    private function normalizeValue(bool|float|int|string|null $value): string
    {
        return trim(strval($value));
    }
}
