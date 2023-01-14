<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class registrationRequest extends FormRequest
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
            'full_name' => 'fullname'
        ];
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'gender' => 'required|string|max:191',
            'email' => 'email|unique:users,email',
            'password' => 'required|confirmed|min:6|max:191',
        ];
    }
}
