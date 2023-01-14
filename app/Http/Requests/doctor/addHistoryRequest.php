<?php

namespace App\Http\Requests\doctor;

use Illuminate\Foundation\Http\FormRequest;

class addHistoryRequest extends FormRequest
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
            "od" => 'required', 
            "os" => 'required',
            "r" => 'required',
            "l"  => 'required',
            "pd" => 'required',
            "tint" => 'required', 
            "lens" => 'required',
            "pres" => 'required',
        ];
    }
}
