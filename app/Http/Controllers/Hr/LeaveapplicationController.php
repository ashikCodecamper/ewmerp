<?php

namespace App\Http\Controllers\Hr;
use DateTime;
use Validator;
use DB;
use App\LeaveType;
use App\Hremployee;
use App\Leaveapplication;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveapplicationController extends Controller
{
    public function index() {
      $leavetypes = LeaveType::all();
      $employees = Hremployee::all();
      $leaveapplications = DB::table('leaveapplications')
        ->join('hremployees', function ($join) {
            $join->on('hremployees.id', '=', 'leaveapplications.employee_id');
        })->join('leave_types', function ($join) {
            $join->on('leave_types.id', '=', 'leaveapplications.leavetype_id');
        })
        ->get();
  return view('hr.leaveapplication',['leavetypes'=>$leavetypes,'employees'=>$employees,'leaveapplications'=>$leaveapplications]);
    }
    public function create(Request $request) {
      $rules = array(
            'employee_id'       => 'required',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'reason' => 'required|max:200'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
           return redirect(route('leaveapplication'))
               ->withErrors($validator)
               ->withInput();
       } else {
      $from_dat = new DateTime($request->from_date);
      $to_dat = new DateTime($request->to_date);
      $leave_days = $to_dat ->diff($from_dat)->format("%a");
      $leaveapp = new Leaveapplication;
      $leaveapp->employee_id = $request->employee_id;
      $leaveapp->leavetype_id = $request->leavetype_id;
      $leaveapp->from_date = $request->from_date;
      $leaveapp->to_date = $request->to_date;
      $leaveapp->reason = $request->reason;
      $leaveapp->leave_days = $leave_days;
      $leaveapp->status = 'open';
      $leaveapp->save();
      return redirect(route('leaveapplication'));

      }
    }
}
