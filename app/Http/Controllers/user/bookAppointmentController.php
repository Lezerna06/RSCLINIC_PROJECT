<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\appointment\userCreateAppointmentRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class bookAppointmentController extends Controller
{
    //
    public function index(){
        $data = [
            'specs' => Specialization::orderBy('specialization', 'asc')->get('specialization')
        ];
        return view('user.appointment.add', $data);
    }
    public function store(userCreateAppointmentRequest $request){
        $doc = Doctor::where('id', $request->doctor)->first();
        
        try{
            DB::commit();
            $appointment = new Appointment;
            $appointment->user_id = Auth::user()->id;
            $appointment->doctor_id = $request->doctor;
            $appointment->docFees = $doc->docFees;
            $appointment->save();

    public function checkDoctor(Request $request){
        $spec = $request->spec;
        $doctor = $request->doctor;
       
        if($request->button == "spec"){
            if(empty($request->spec)){
                return response()->json([
                    'status' => 'doctor',
                    'response' => '<option value= "" selected="selected">Select Doctor</option>',
                ]);
            }
            
            $users = Doctor::where('specialization', $spec)->orderBy('fullName', 'asc')->get();
            
            $data = '';

            foreach($users as $user){
                $data = $data . '<option value="'. $user->id .'"> ' . ucwords($user->fullName) .' </option>';
            }

            return response()->json([
                'status' => 'doctor',   
                'response' => '<option value="" selected="selected">Select Doctor </option>' . $data,
            ]);
        }

        if(empty($request->doctor)){
            return response()->json([
                'status' => 'fee',
                'response' => '',
            ]);
        }

        $user = Doctor::where('id', $doctor)->first();

            return response()->json([
                'status' => 'fee',
                'response' =>  number_format($user->docFees, 2, '.', ','),
            ]);

    }

    public function appointmentHistoryIndex(){
        $appointment = Appointment::with(['user', 'doctor'])->orderBy('appointmentDate','desc')->get();
        $data = [
            'appointments' => $appointment,
            'count' => 1
        ];
       
        return view('user.appointment.history', $data);
    }

    public function appointmentCancel(Request $request){
        try{
            DB::beginTransaction();
            $appointment = Appointment::findOrFail($request->appointment);
            $appointment->status = 1;
            $appointment->save();
            DB::commit();
            return redirect()->route('user.appointment.history')->with('success', 'Your appointment has been canceled.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('user.appointment.history')->with('error', 'Something went wrong, please try again.');
        }
    }
}
