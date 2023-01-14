<?php

namespace App\Rules;

use App\Models\Specialization;
use Illuminate\Contracts\Validation\Rule;

class checkSpecializationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id = $id;
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
        $result = true;
        if(Specialization::where('Specialization', $value)->where('id', $this->id)->first()){
            $result = true;
        }

        if(Specialization::where('Specialization', $value)->where('id', '!=', $this->id)->first()){
           $result = false; 
        }
        return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The specialization already exists.';
    }
}
