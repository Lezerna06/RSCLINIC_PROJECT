<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class appointmentController extends Controller
{
    //
    public function appointmentHistoryIndex(){
        $docid = Doctor::with('user')->first();
        $appointment = Appointment::with(['user', 'doctors'])->where('doctor_id', $docid->id)->orderBy('appointmentDate','desc')->get();
        $data = [
            'appointments' => $appointment,
            'count' => 1
        ];
        
        return view('doctor.appointment.index', $data);
    }
}
