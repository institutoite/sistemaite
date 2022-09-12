<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
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
        //return false;
         $response=Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify',[
             'secret'=>"6LeZpOQhAAAAAE_HhdRCOAWNPMqMuBBGlXwkTJ26",
             'response'=>$value])->object();
        if($response->success && ($response->score>0.7)){
            return true;
        }else{
            return false;
        }
        return response();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La validacion de recapcha esta fallando';
    }
}
