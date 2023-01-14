<?php

namespace App\Http\Requests\auth;

use App\Rules\checkCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class changePasswordRequest extends FormRequest
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
            'currentpassword' => 'current password'
        ];
    }

    public function rules()
    {
        return [
            'currentpassword' => ['required', new checkCurrentPassword],
            'password' => ['required', 'confirmed', 'min:6']
        ];
    }
}
