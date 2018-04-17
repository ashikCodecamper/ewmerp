<?php

namespace App\Http\Controllers\Hr;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Designation;
class DesignationController extends Controller
{
    public function designation() {
        $degn = Designation::all();
        return view('hr.designation',['degn'=>$degn]);
    }

    public function createdeg(Request $request) {
        $validator = Validator::make($request->all(), [
            'deg_name' => 'required|unique:designations|max:255',
        ]);

        
            $degn = new Designation;
            $degn->deg_name = $request->deg_name;
            $degn->save();
            return redirect()->route('designation');
      
    }
}
