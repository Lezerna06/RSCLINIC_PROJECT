<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\recoverPasswordRequest;
use App\Http\Requests\auth\registrationRequest;
use App\Http\Requests\auth\userLogRequest;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Userdata;
use App\Models\Userlog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class authController extends Controller
{
    //
    public function userIndex(){
        return view('auth.login.userLogin');
    }
    public function userCheck(userLogRequest $request){
                
        $credentials = ['email' => $request->username, 'password' => $request->password, 'restriction' => 3];
        if(!auth()->attempt($credentials)){
            $log = new Userlog;
            $log->ip = $request->ip();
            $log->email = $request->username;
            $log->restriction = 3;
            $log->status = 0;
            $log->updated_at = null;
            $log->save();
            return back()->with('error', 'Invalid Credentials');
        }

        $log = new Userlog;
        $log->user_id = Auth::user()->id;
        $log->ip = $request->ip();
        $log->email = $request->username;
        $log->restriction = 3;
        $log->status = 1;
        $log->updated_at = null;
        $log->save();
       

        return redirect('/login/user')->with('success', 'Welcome ' . auth()->user()->fullName . '!');

    }
    public function doctorIndex(){
        return view('auth.login.doctorLogin');
    }

    public function doctorCheck(userLogRequest $request){
                
        $credentials = ['email' => $request->username, 'password' => $request->password, 'restriction' => 2];
        if(!auth()->attempt($credentials)){
            $log = new Userlog;
            $log->ip = $request->ip();
            $log->email = $request->username;
            $log->restriction = 2;
            $log->status = 0;
            $log->updated_at = null;
            $log->save();
            return back()->with('error', 'Invalid Credentials');
        }
        
        $log = new Userlog;
        $log->user_id = Auth::user()->id;
        $log->ip = $request->ip();
        $log->email = $request->username;
        $log->restriction = 2;
        $log->status = 1;
        $log->updated_at = null;
        $log->save();

        return redirect('/login/doctor')->with('success', 'Welcome ' . auth()->user()->fullName . '!');
    }

    public function adminIndex(){
        return view('auth.login.adminLogin');
    }

    public function adminCheck(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = ['username' => $request->username, 'password' => $request->password, 'restriction' => 1];
        if(!auth()->attempt($credentials)){
            return back()->with('error', 'Invalid Credentials');
        }
        
        return redirect('/login/doctor')->with('success', 'Welcome ' . auth()->user()->username . '!');
    }

    public function registrationIndex(){
        return view('auth.registration');
    }
    public function registrationStore(registrationRequest $request){
        try {
            DB::beginTransaction();
            $user = new User;
            $user->restriction = 3;
            $user->fullName = $request->full_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            $userdata = new Userdata;
            $userdata->user_id = $user->id;
            $userdata->address = $request->address;
            $userdata->city = $request->city;
            $userdata->gender = $request->gender;
            $userdata->save();

            DB::commit();
            return redirect('/login/user')->with('success', 'You have been successfully registered, Please try to login.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Something went wrong please try again!'); // 'Something went wrong please try again!'
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

    public function recoveryIndex(Request $request){
        if($request->account === 'user'){
            return view('auth.recoverpassword.recoveruserpassword');
        }else if($request->account === 'doctor'){  
            return view('auth.recoverpassword.recoverdoctorpassword');
        }
        
        return back();
        
    }

    public function recoveryCheck(recoverPasswordRequest $request){
        
        if($request->restriction !== "3" && $request->restriction !== "2"){
            return back()->with('error', 'Invalid Restriction');
        } 

        // user/patients
        if($request->restriction == "3"){
            if(! $user = User::where('restriction', 3)
                ->where('fullName', $request->contactno)
                ->where('email', $request->email)
                ->first()){
                    return back()->with('error', 'Invalid Credentials');
            }

            $data = [
                'userid' => $user->id,
                'restriction' => $user->restriction
            ];

            return view('auth.resetpassword.userresetpassword', $data);
            // return redirect('/reset/password')->with('user', $user);
        }

        // doctor   
        $contactno = $request->contactno;                 
        if(! $user = User::with('doctor')
            ->whereHas('doctor', function(Builder $query) use($contactno){
                $query->where('contactno', $contactno);
            })->where('restriction', 2)
            ->where('email', $request->email)
            ->first()){

            return back()->with('error', 'Invalid Credentials');
        }
        
        $data = [
            'userid' => $user->id,
            'restriction' => $user->restriction,
        ];

        
        return view('auth.resetpassword.doctorresetpassword', $data);
        // return redirect('/reset/password')->with('user', $user);
    }

    
    

    public function storeReset(Request $request){
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed|min:6'
        ]);
        
        $data = [
            'userid' =>  $request->user_id,
            'restriction' => $request->restriction
            ];

            $test = $validator->errors()->messages();
            
        if($validator->fails()){
            if($request->restriction !== "2"){
                return view('auth.resetpassword.userresetpassword', $data)->with('errors', $test['password'][0]);
            }
            return view('auth.resetpassword.doctorresetpassword', $data)->with('errors', $test['password'][0]);
        }
        try{

        DB::beginTransaction();
        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();
        
        DB::commit();
            return redirect('/')->with('success', 'Your password has been successfully reset.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('/')->with('error', 'Something went wrong please try again!'); // 'Something went wrong please try again!'
        }

    }

    public function logout(){
       
            if(Auth::user()->restriction !== 1){
                if($log = Userlog::where('user_id', Auth::user()->id)->latest('id')->first()){
                    $log->updated_at = Carbon::now()->toDateTimeString();
                    $log->save();
                }
            }
            Auth::logout();
            return redirect()->route('index');
        
    }
   


}
