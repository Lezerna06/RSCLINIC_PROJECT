<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class appointmentController extends Controller
{
    //
    public function index(){
        $data = [
            'count' => 1,
            'appointments' => Appointment::with('user','doctor')->orderBy('appointmentDate','desc')->get(),
        ];
        
    }
}
