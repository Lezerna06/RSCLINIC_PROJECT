<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class doctorProfileRequest extends FormRequest
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
            "spec" => "specialization",
            "address" => "clinic's address",
            "fee" => "doctor's fee",
            "contactno" => "contact number"
        ];        
    }

    public function rules()
    {
        return [
            "spec" => "required|string|max:191",
            "name" => "required|string|max:191",
            "address" => "required|max:191",
            "fee" => "required|numeric|between:0,9999999.99",
            "contactno" => "required|digits:11",
            "email" => 'email',
        ];
    }

    public function messages(){
        return [
            "fee.between" => "The doctor's fee must be a number. e.g: 10.99."
        ];        
    }
}
