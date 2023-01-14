<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\changePasswordRequest;
use App\Http\Requests\profile\updateProfileRequest;
use App\Models\User;
use App\Models\Userdata;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    //
    public function index(){
        
        if(! $profile = Userdata::where('user_id', Auth::user()->id)->first()){
            abort(404);
        }
        $data = [
            'profile' => $profile,
        ];
        return view('user.profile.profile', $data);
    }

    public function update(updateProfileRequest $request){
        try{
            DB::beginTransaction();
                $user = User::findOrFail(Auth::user()->id);
                $user->fullName = $request->name;
                $user->save();
                $userdata = Userdata::where('user_id', Auth::user()->id)->first();
                $userdata->address = $request->address;
                $userdata->city = $request->city;
                $userdata->gender = $request->gender;
                $userdata->updated_at = Carbon::now();  
                $userdata->save();
                return redirect()->route('user.profile')->with('success', 'Your profile has been updated successfully.');
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user.profile')->with('error', 'Something went wrong, Please try again!'); // 'Something went wrong please try again!'
        }
    }

    public function changepasswordIndex(){
        return view('user.profile.changePassword');
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
            DB::commit();
            return response()->json([
                'message' => '<h5 style="font-size:18px;" class="text-success">Your password has been updated Successfully</h5>'
            ]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => '<h5 style="font-size:18px; class="text-danger">Something went wrong, Please try again.</h5>'
            ]);
        }
    }
}
