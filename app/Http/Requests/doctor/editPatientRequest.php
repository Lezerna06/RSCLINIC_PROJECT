<?php

namespace App\Http\Requests\doctor;

use Illuminate\Foundation\Http\FormRequest;

class editPatientRequest extends FormRequest
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
            'medhis' => 'medical history'
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'gender' => 'required|string|max:191',
            // 'email' => 'email|unique:patients,user_email',
            'contact' => 'required|numeric|digits:11',
            'age' => 'required|integer|max:200',
            'medhis' => 'required|string'
        ];
    }
}
