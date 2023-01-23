<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    //
    public function index(){
        $data = [
            'count' => 1,
            'users' => User::with('userdata')->where('restriction',3)->orderBy('fullName', 'Asc')->get()
        ];
        return view('admin.user.index',$data);
    }
    public function destroy(Request $request){
        try
        {
            DB::beginTransaction();
            User::findOrFail($request->user_id)->delete();
            Userdata::where('user_id',$request->user_id)->delete();
            DB::commit();
            return redirect()->route('admin.user.manage')->with('success',"User account has been deleted successfully");
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            return redirect()->route('admin.user.manage')->with('error','Something went wrong, please try again.');
        }
    }
}
