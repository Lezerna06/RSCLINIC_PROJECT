<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\changePasswordRequest;
use App\Http\Requests\profile\doctorProfileRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    //
    public function index(){
        
        if(! $profile = Doctor::where('user_id', Auth::user()->id)->first()){
            abort(404);
        }
        $data = [
            'profile' => $profile,
            'specs' => Specialization::where('specialization', '!=', $profile->specialization)->orderBy('specialization', 'asc')->get()
        ];
        return view('doctor.profile.profile', $data);
    }

    public function update(doctorProfileRequest $request){
        try{
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            $user->fullName = $request->name;
            $doctor = Doctor::where('user_id', Auth::user()->id)->first();
            $doctor->fullName = $request->name;
            $doctor->specialization = $request->spec;
            $doctor->address = $request->address;
            $doctor->docFees = $request->fee;
            $doctor->contactno = $request->contactno;
            $user->save();
            $doctor->save();
            DB::commit();
            return redirect()->route('doctor.profile')->with('success', "Your account has been successfully updated.");
        }catch(\Exception $e){  
            DB::rollBack();
            return redirect()->route('doctor.profile')->with('error','Something went wrong, please try again.');
        }
    }

   
    public function changepasswordIndex(){
        return view('doctor.profile.changePassword');
    }

    public function updatepassword(changePasswordRequest $request){
         
        if(Hash::check($request->password, Auth::user()->password)){
            return response()->json([
                'message' => '<h5 style="font-size:18px;" class="text-danger">Please make sure you are not using your current password as new password.</h5>'
            ]);
        }
        
        try{
            DB::beginTransaction();
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
    }
}
