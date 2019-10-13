<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Tel implements Rule
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
        //
        return preg_match('/\A\d{2,4}-?\d{2,4}-?\d{4}\z/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '正しい電話番号を入力してください。';
    }
}
