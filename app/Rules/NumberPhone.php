<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumberPhone implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/(84|0[3|5|7|8|9])+([0-9]{8})\b/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('messages.numberPhone.faild');
    }
}
