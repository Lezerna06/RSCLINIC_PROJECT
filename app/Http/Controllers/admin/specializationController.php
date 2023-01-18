<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\specialization\addSpecializationRequest;
use App\Models\Specialization;
use App\Rules\checkSpecializationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class specializationController extends Controller
{
    public function index(){
        $spec = Specialization::orderBy('specialization', 'asc')->get();
        $data = [
            'count' => 1,
            'specializations' => $spec
        ];
        return view('admin.specialization.create', $data);
    }

    public function store(addSpecializationRequest $request){
        try{
            DB::beginTransaction();
            $spec = new Specialization;
            $spec->specialization = $request->spec;
            $spec->save();
            DB::commit();
            return redirect()->route('admin.specialization.add')->with('success',"New doctor's specialization has been added successfully");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.specialization.add')->with('error','Something went wrong, please try again.');
        }
    }

    public function indexEdit(Request $request){
        $data = [
            'spec' => Specialization::findOrFail($request->spec_id)
        ];
        return view('admin.specialization.edit', $data);
    }

    public function storeEdit(Request $request){
        $request->validate([
            'nspec' => ['required' ,new checkSpecializationRule($request->spec_id)]
        ]);

        try{
            DB::beginTransaction();
            $spec = Specialization::findOrFail($request->spec_id);
            $spec->specialization = $request->nspec;
            $spec->save();
            DB::commit();
            return redirect()->route('admin.specialization.edit',[$request->spec_id,$request->nspec])->with('success', ucwords($request->spec)." has been updated to ". ucwords($request->nspec) ." successfully");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.specialization.edit',[$request->spec_id,$request->spec])->with('error','Something went wrong, please try again.');
        }
        
    }

    public function destroy(Request $request){
        try{
            DB::beginTransaction();
            Specialization::findOrFail($request->spec_id)->delete();
            DB::commit();
            return redirect()->route('admin.specialization.add')->with('success', ucwords($request->spec)." has been deleted successfully");
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.specialization.add')->with('error','Something went wrong, please try again.');
        }

    }
}
