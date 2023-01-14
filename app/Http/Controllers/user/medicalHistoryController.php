<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Medicalhistory;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class medicalHistoryController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->id;
        $patient = Patient::with('user')->whereHas('user', function(Builder $query) use($id){
            $query->where('id', $id);
        })->orderBy('created_at')->get();

        $data = [
            'patients' => $patient,
            'count' => 1
        ];
        return view('user.medicalhistory.main',$data);
    }

    public function viewIndex(Request $request){ 
        $data = [
            'patient' => Patient::findOrFail($request->patient_id),
            'history' => Medicalhistory::where('patient_id', $request->patient_id)->latest()->get(),
            'count' => 1
        ];
        return view('user.medicalhistory.view', $data);
    }
}
