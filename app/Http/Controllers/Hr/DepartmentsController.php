<?php

namespace App\Http\Controllers\Hr;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
class DepartmentsController extends Controller
{
    public function index() {
        return view('hr.dashboard');
    }

    public function departments() {
        $dept = Department::all();
        return view('hr.department',['dept'=>$dept]);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'dep_name' => 'required|unique:departments|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('departments')
                        ->withErrors($validator)
                        ->withInput();
        }else {
            $dept = new Department;
            $dept->dep_name = $request->dep_name;
            $dept->save();
    
           return redirect()->route('hremployees');
        }
        
    }

}
