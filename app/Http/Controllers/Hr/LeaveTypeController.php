<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index()
    {
        $leavetypes = LeaveType::all();

        return view('hr.leavetype', ['leavetypes'=>$leavetypes]);
    }

    public function create(Request $request)
    {
        $leaveType = new LeaveType();
        $leaveType->leave_name = $request->leave_name;
        $leaveType->max_allowed_days = $request->max_allowed_days;
        $leaveType->save();

        return redirect(route('leavetype'));
    }
}
