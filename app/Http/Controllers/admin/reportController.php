<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Userlog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class reportController extends Controller
{
    //
    public function logIndex(Request $request){
        
        if($request->account == "doctor"){
            $res = 2;
            $query = Userlog::where('restriction', 2)->latest()->get();
        }elseif($request->account == "user"){
            $res= 3;
            $query = Userlog::where('restriction', 3)->latest()->get();
        }else{
            abort(404);
        }
        $data = [
            'res' => $res,
            'count' => 1,
            'logs' => $query
        ];
        return view('admin.logs.index',$data);
    }

    public function showBetween(){
        return view('admin.medicalhistory.between');
    }
    public function searchBetween(Request $request){
        $request->validate([
            'fromdate' => 'required',
            'todate' => 'required'
        ]);

        $patient = Patient::whereBetween('created_at',[$request->fromdate,$request->todate])->orderBy('created_at', 'desc')->get();
        $startdate = $request->fromdate;
        $enddate =  $request->todate;
        if($request->fromdate > $request->todate){
            $patient = Patient::whereBetween('created_at',[$request->todate,$request->fromdate])->orderBy('created_at', 'desc')->get();
            $startdate = $request->todate;
            $enddate =  $request->fromdate;
        }
        $data = [
            'patients' => $patient,
            'count' => 1,
            'start' => $startdate,
            'end' => $enddate
        ];
        
        return view('admin.medicalhistory.betweenresult', $data);
    }
    
    public function searchIndex(){
        return view('admin.search.index');
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
        $data = [
            'patients' => $patient,
            'count' => 1,
            'status' => $status,
            'input' => $request->search
        ];
        return view('admin.search.index', $data);
    }
}
