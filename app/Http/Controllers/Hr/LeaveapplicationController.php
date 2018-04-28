<?php

namespace App\Http\Controllers\Hr;
use DateTime;
use Validator;
use DB;
use App\Leaveapplication;
use App\TakeLeave;
use App\Http\Resources\LeaveResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveapplicationController extends Controller
{
    public function index() {

      return view('hr.leave.viewleaveapp',['takeleaves'=>TakeLeave::all()]);
    }
    public function api() {
      return LeaveResource::collection(TakeLeave::all());
    }
    public function postapi(Request $request) {
      $leave = TakeLeave::find($request->id);
      $leave->status=$request->status;
      $leave->save();
    }


}
