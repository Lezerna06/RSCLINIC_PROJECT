<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class userLogRequest extends FormRequest
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
    public function attributes()
    {
        return [
            'username' => 'email'
        ];
    }
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }
}
