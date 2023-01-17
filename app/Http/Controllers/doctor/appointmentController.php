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
        $appointment = Appointment::with(['user', 'doctor'])->where('doctor_id', $docid->id)->orderBy('appointmentDate','desc')->get();
        $data = [
            'appointments' => $appointment,
            'count' => 1
        ];
        
        return view('doctor.appointment.index', $data);
    }
    public function appointmentCancel(Request $request){
        try{
            DB::beginTransaction();
            $appointment = Appointment::findOrFail($request->appointment);
            $appointment->status = 2;
            $appointment->save();
            DB::commit();
            return redirect()->route('doctor.appointment.history')->with('success', 'Selected appointment has been canceled.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('doctor.appointment.history')->with('error', 'Something went wrong, please try again.');
        }
}
