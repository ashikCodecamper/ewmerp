<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $employee = $user->profile;

        return view('hr.employee.show', ['id'=>$id, 'user'=>$user, 'userprofile'=>$employee]);
    }

    public function show($id)
    {
        return 'employee show'.$id;
    }

    public function create()
    {
        $deps = Department::all();
        $secs = Hrsection::all();
        $degis = Designation::all();
        $emptypes = EmploymentType::all();

        return view('employee.create', ['deps'=>$deps, 'secs'=>$secs, 'degis'=>$degis, 'emptypes'=>$emptypes]);
    }
}
