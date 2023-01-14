<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    //
    public function index(){
        $countuser = User::where('restriction', 3)->count();
        $countdoctor = Doctor::count();
        $countpatient = Patient::count();
        $newqueries = Contact::where('isRead', 0)->count();
        $data = [            
                'user' => $countuser,
                'doctor' => $countdoctor,
                'patient' => $countpatient,
                'query' => $newqueries
        ];
        return view('admin.dashboard', $data);
    }
}
