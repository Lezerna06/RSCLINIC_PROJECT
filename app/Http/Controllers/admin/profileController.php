<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\changePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{
    public function index(){
        return view('admin.profile.changePassword');
    }

    public function update(changePasswordRequest $request){

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
