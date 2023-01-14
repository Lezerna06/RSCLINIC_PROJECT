<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\addDoctorRequest;
use App\Http\Requests\admin\editDoctorRequest;
use App\Models\Doctor;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class doctorController extends Controller
{

    public function indexManage(){
        $data = [
            'doctors' => Doctor::orderBy('fullName')->get(),
            'count' => 1
        ];

        return view('admin.doctor.index',$data);
    }

    public function index(){
        $data = [
            'specs' => Specialization::orderBy('specialization')->get('specialization')
        ];
        return view('admin.doctor.create',$data);
    }

    public function destroy(Request $request){
        try{
            DB::beginTransaction();
            Doctor::findOrFail($request->doc_id)->delete();
            DB::commit();
            return redirect()->route('admin.doctor.manage')->with('success', ucwords($request->doc)."'s account has been deleted successfully");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.doctor.manage')->with('error','Something went wrong, please try again.');
        }
    }

    public function indexEdit(Request $request){
        $data = [
            'doctor' => $doctor = Doctor::with('user')->where('id',$request->doc_id)->first(),
            'specs' => Specialization::where('specialization', '!=', $doctor->specialization)->orderBy('specialization')->get()
        ];
        return view('admin.doctor.edit', $data);
    }

    public function storeEdit(editDoctorRequest $request){
        try{
            DB::beginTransaction();
            $user = User::where('email', $request->email)->first();
            $user->fullName = $request->name;
            $doctor = Doctor::findOrFail($request->doc_id);
            $doctor->fullName = $request->name;
            $doctor->specialization = $request->spec;
            $doctor->address = $request->address;
            $doctor->docFees = $request->fee;
            $doctor->contactno = $request->contact;
            $user->save();
            $doctor->save();
            DB::commit();
            return redirect()->route('admin.doctor.edit',[$request->doc_id, $request->doc])->with('success', "Doctor's account has been successfully updated.");
        }catch(\Exception $e){  
            DB::rollBack();
            return redirect()->route('admin.doctor.edit',[$request->doc_id, $request->doc])->with('error','Something went wrong, please try again.');
        }
    }

    public function store(addDoctorRequest $request){
        try{
            DB::beginTransaction();
            $user = new User;
            $user->fullName = $request->name;
            $user->email = $request->email;
            $user->restriction = 2;
            $user->password = Hash::make($request->password);
            $user->save();

            $doctor = new Doctor;
            $doctor->fullName = $request->name;
            $doctor->user_id = $user->id;
            $doctor->specialization = $request->spec;
            $doctor->address = $request->address;
            $doctor->docFees = $request->fee;
            $doctor->contactno = $request->contact;
            $doctor->save();
            DB::commit();
            return redirect()->route('admin.doctor.add')->with('success', "New doctor's account has been successfully added.");
        }catch(\Exception $e){  
            DB::rollBack();
            return redirect()->route('admin.doctor.add')->with('error','Something went wrong, please try again.');
        }
    }

    public function registrationCheckemail(Request $request){
        if(User::where('email', $request->email)->exists()){
            return response()->json([
                "<span style='color:red'> Email already exists .</span>",
                "<script>$('#submit').prop('disabled',true);</script>"
           ]);
        }  
        return response()->json([
            "<span style='color:green'> Email available for Registration .</span>",
            "<script>$('#submit').prop('disabled',false);</script>"
        ]);
    }
}
