<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use Illuminate\Support\Facades\DB;

class RegisterpageRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($inputval)
    {
        $this->inputval = $inputval;
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
        /*return $this->inputval === 'bc';*/
        if($this->inputval === 'bc'){
            return true;
        }else{
            return false;
        }
        //return strpos($this->inputval,'bc');
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'bcが含まれていません。';
    }
}
