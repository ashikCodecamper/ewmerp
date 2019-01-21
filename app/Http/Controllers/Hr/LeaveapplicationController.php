<?php

namespace App\Http\Controllers\Hr;

use App\Http\Controllers\Controller;
use App\Http\Resources\LeaveResource;
use App\TakeLeave;
use Illuminate\Http\Request;

class LeaveapplicationController extends Controller
{
    public function index()
    {
        return view('hr.leave.viewleaveapp', ['takeleaves'=>TakeLeave::all()]);
    }

    public function api()
    {
        return LeaveResource::collection(TakeLeave::all());
    }

    public function postapi(Request $request)
    {
        $leave = TakeLeave::find($request->id);
        $leave->status = $request->status;
        $leave->save();
    }
}
