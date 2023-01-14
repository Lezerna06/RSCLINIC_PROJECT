<?php

namespace App\Http\Requests\appointment;

use Illuminate\Foundation\Http\FormRequest;

class userCreateAppointmentRequest extends FormRequest
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
        $now = date('Y-m-d');
        $now = date('Y-m-d', strtotime($now . ' + 2 days'));
        return [
            'spec' => 'required',
            'doctor' => 'required',
            'appdate' => 'required|date_format:Y-m-d|after_or_equal:' . $now,
            'apptime' => 'required|date_format:h:i A',
        ];
    }

    public function messages(){
        return [
            'spec.required' => 'Select specialization.',
            'doctor.required' => 'Select doctor.',
            'appdate.date_format' => 'Invalid date format. E.g.: 2000-02-30',
            'after_or_equal' => 'The date must be ahead of two(2) days',
            'apptime.date_format' => 'Invalid date format. E.g.: 10:00 PM',
        ];
    }
}
