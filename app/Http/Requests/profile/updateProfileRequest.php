<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;

class updateProfileRequest extends FormRequest
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
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'gender' => 'required|string|max:15'
        ];
    }
}
