<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactController extends Controller
{
    //
    public function index(){
        return view('guest.contact');
    }
    
    public function store(contactRequest $request){
        try {
            DB::beginTransaction();
            $contact = new Contact;
            $contact->fullName = $request->fullname;
            $contact->email = $request->email;
            $contact->contactNo = $request->mobileno;
            $contact->message = $request->description;
            $contact->save();
        
            DB::commit();

            return redirect('/contactus')->with('success', 'Your information has been succesfully submitted');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Something went wrong please try again!'); // 'Something went wrong please try again!'
        }
    }

    public function unreadIndex(){
        $data = [
            'queries' => Contact::where('isRead', 0)->orderBy('created_at', 'desc')->get(),
            'count' => 1
        ];
        return view('admin.query.unreadIndex', $data);
    }

    public function unreadOpen(Request  $request){
        $data = [
            'query' => Contact::findOrFail($request->query_id),
        ];
        return view('admin.query.openIndex', $data);
    }

    public function updateQuery(Request $request){
        $request->validate([
            'adminremark' => 'required|string'
        ]);
        try{
            DB::beginTransaction();
            $contact = Contact::findOrFail($request->query_id);
            $contact->adminRemark = $request->adminremark;
            $contact->isRead = 1;
            $contact->save();
            DB::commit();
            return redirect()->route('admin.query.unread');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.query.unread')->with('error', 'Something went wrong, please try again');
        }
    }

    public function readIndex(){
        $data = [
            'queries' => Contact::where('isRead', 1)->orderBy('created_at', 'desc')->get(),
            'count' => 1
        ];
        return view('admin.query.readIndex', $data);
    }
}
