<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DniValidation implements Rule
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
        return preg_match('/^\d{8}$/', $value);
    }

    /**
     * Get the validation error message.
     * Cree una nueva dimension para 
     *
     * @return string
     */
    public function message()
    {
        return 'DNi Supero limite de Caracteres';
    }
}
