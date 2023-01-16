<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Medicalhistory;
use App\Models\Patient;
use Illuminate\Http\Request;

class medicalHistoryController extends Controller
{
    //
    public function index(){
        $patient = Patient::orderBy('created_at', 'desc')->get();
        $data = [
            'patients' => $patient,
            'count' => 1
        ];
        return view('admin.medicalhistory.main',$data);
    }

    public function viewIndex(Request $request){ 
        $data = [
            'patient' => Patient::findOrFail($request->patient_id),
            'history' => Medicalhistory::where('patient_id', $request->patient_id)->latest()->get(),
            'count' => 1
        ];
        return view('admin.medicalhistory.view', $data);
    }
}
