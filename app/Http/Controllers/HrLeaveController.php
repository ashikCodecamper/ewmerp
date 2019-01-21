<?php

namespace App\Http\Controllers;

use App\HrLeaveType;
use App\TakeLeave;
use Auth;
use Illuminate\Http\Request;
use Session;

class HrLeaveController extends Controller
{
    public function takealeave()
    {
        return view('hr.leave.takealeave', ['leavetypes'=>HrLeaveType::all()]);
    }

    public function savetakealeave(Request $request)
    {
        $leave = new TakeLeave();
        $leave->user_id = $request->user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->from_date = $request->from_date;
        $leave->to_date = $request->to_date;
        $leave->leave_desc = $request->leave_desc;
        $leave->save();
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('takealeave');
    }

    public function leavehistory()
    {
        $leavehistory = TakeLeave::where('user_id', '=', Auth::User()->id)->get();

        return view('hr.leave.leavehistory', ['leaves'=>$leavehistory]);
    }

    public function holidaycalender()
    {
        return view('hr.leave.holidaycalender');
    }
}
