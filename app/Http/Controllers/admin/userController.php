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
}
