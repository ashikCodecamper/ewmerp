<?php

namespace App\Http\Controllers\Hr;

use App\Department;
use App\Designation;
use App\EmploymentType;
use App\Hremployee;
use App\Hrsection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends Controller
{
    public function hremployees()
    {
        $emps = Hremployee::all();
        $deps = Department::all();
        $secs = Hrsection::all();
        $degis = Designation::all();
        $emptypes = EmploymentType::all();

        return view('hr.employeelist', ['emps'=>$emps, 'deps'=>$deps, 'secs'=>$secs, 'degis'=>$degis, 'emptypes'=>$emptypes]);
    }

    public function showhremployees($id)
    {
        $hremp = Hremployee::find($id)->first();

        return view('hr.showhremployees', ['hremp'=>$hremp]);
    }

    public function create()
    {
        return view('hr.createhremployee');
    }

    public function addhremployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name'  => 'required|unique:hremployees|max:255',
            'dob'        => 'required',
            'nid'        => 'required',
            'joindate'   => 'required',
            'phone'      => 'required',
            'email'      => 'required',
            'addr'       => 'required',
            'designation'=> 'required',
            'section'    => 'required',
            'dep'        => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('hremployees')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $emp = new Hremployee();
            $emp->full_name = $request->full_name;
            $emp->dob = $request->dob;
            $emp->nid = $request->nid;
            $emp->joindate = $request->joindate;
            $emp->phone = $request->phone;
            $emp->email = $request->email;
            $emp->addr = $request->addr;
            $emp->designation = $request->designation;
            $emp->section = $request->section;
            $emp->dep = $request->dep;
            $emp->addr = $request->addr;
            $emp->save();

            return redirect()->route('hremployees');
        }
    }
}
