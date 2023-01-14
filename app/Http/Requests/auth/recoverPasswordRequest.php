<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class recoverPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function attributes(){
        return [
            
            'contactno' => 'input',
            
        ];
    }
    public function rules()
    {
        return [
            'restriction' => 'required|numeric',
            'contactno' => 'required',
            'email' => 'email',
        ];
    }
}
