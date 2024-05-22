<?php

namespace App\Rules;

use Ariaieboy\LaravelSafeBrowsing\Facades\LaravelSafeBrowsing;
use Illuminate\Contracts\Validation\Rule;

class UrlSafeForBrowsing implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */

    public function passes($attribute, $value)
    {
        $urlSafeBrowsingResult = LaravelSafeBrowsing::isSafeUrl($value, true);
        $threatTypes = config('laravel-safe-browsing.google.threatTypes');

        for ($i = 0; $i < count($threatTypes); $i++) {
            if ($threatTypes[$i] == $urlSafeBrowsingResult) {
                return true;
            }
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The attribute is not safe for browsing.';
    }
}
