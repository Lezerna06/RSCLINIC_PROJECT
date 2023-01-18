<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\doctor\addHistoryRequest;
use App\Http\Requests\doctor\addPatientRequest;
use App\Http\Requests\doctor\editPatientRequest;
use App\Models\Doctor;
use App\Models\Medicalhistory;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class patientController extends Controller
{
    //
    public function index(){
        $docid = Doctor::with('user')->where('user_id', Auth::user()->id)->first('id');
        $patient = Patient::where('doctor_id', $docid->id)->orderBy('fullName', 'asc')->get();
        $data = [
            'count' => 1,
            'patients' => $patient
        ];
        return view('doctor.patient.index',$data);
    }
    public function addIndex(){
        return view('doctor.patient.create');
    }
    public function addStore(addPatientRequest $request){
        try{
            DB::beginTransaction();
            $docid = Doctor::with('user')->where('user_id', Auth::user()->id)->first('id');
            $patient = new Patient;
            $patient->doctor_id = $docid->id;
            $patient->user_email = $request->email;
            $patient->fullName = $request->name;
            $patient->gender = $request->gender;
            $patient->contactno = $request->contact;
            $patient->address = $request->address;
            $patient->age = $request->age;
            $patient->medhistory = $request->medhis;
            $patient->save();
            DB::commit();
            return redirect()->route('doctor.patient.add')->with('success', "New patient has been successfully added.");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('doctor.patient.add')->with('error',"Something went wrong, please try again.");
        }
    }
    public function search(){
        return view('doctor.search.index');
    }

    public function editIndex(Request $request){
        $data = ['patient' => Patient::findOrFail($request->patient_id)];
        return view('doctor.patient.edit',$data);
    }

    public function editStore(editPatientRequest $request){
        try{
            DB::beginTransaction();
            $patient =Patient::findOrFail($request->patient_id);
            $patient->fullName = $request->name;
            $patient->gender = $request->gender;
            $patient->contactno = $request->contact;
            $patient->address = $request->address;
            $patient->age = $request->age;
            $patient->medhistory = $request->medhis;
            $patient->save();
            DB::commit();
            return redirect()->route('doctor.patient.edit',$request->patient_id)->with('success', "Patient's info has been successfully updated.");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('doctor.patient.edit',$request->patient_id)->with('error',"Something went wrong, please try again.");
        }
    }
    public function viewIndex(Request $request){
        $data = [
            'patient' => Patient::findOrFail($request->patient_id),
            'history' => Medicalhistory::where('patient_id', $request->patient_id)->latest()->get(),
            'count' => 1
        ];
        return view('doctor.patient.view',$data);
    }

    public function viewStore(addHistoryRequest $request){
        try{
            DB::beginTransaction();
            $history = new Medicalhistory;
            $history->patient_id = $request->patient_id;
            $history->od = $request->od;
            $history->os = $request->os; 
            $history->r  = $request->r; 
            $history->l = $request->l; 
            $history->pd = $request->pd; 
            $history->tint = $request->tint; 
            $history->lens =  $request->lens;
            $history->medicalpres  = $request->pres; 
            $history->save();
            DB::commit();
            return redirect()->route('doctor.patient.view',$request->patient_id)->with('success', "New medical history has been successfully added.");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('doctor.patient.view',$request->patient_id)->with('error',"Something went wrong, please try again.");
        }
    }
     public function searchShow(Request $request){
        $request->validate([
            'search' => 'required',
        ]);
        $status = false;
        $patient = Patient::where('fullName','LIKE','%'.$request->search.'%')
            ->orWhere('contactno' ,'LIKE','%'.$request->search.'%')->orderBy('fullName', 'Asc')->get();
        if(count($patient)){
            $status = true;
        }
}
