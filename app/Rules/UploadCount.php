<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UploadCount implements Rule
{
    public function passes($attribute, $value)
    {
        if(count($value) == 1){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Je kunt niet meer dan 1 foto uploaden.';
    }
}
