<?php

namespace App\Http\Requests\specialization;

use Illuminate\Foundation\Http\FormRequest;

class addSpecializationRequest extends FormRequest
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
    public function rules()
    {
        return [
            'spec' => 'required|string|unique:specializations,specialization|max:191'
        ];
    }

    public function attributes(){
        return [
            'spec' => 'specialization'
        ];
    }

    public function messages(){
        return [
            'spec.unique' => 'The specialization already exists.'
        ];
    }

}
