<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HrLeaveType;

class HrLeaveController extends Controller
{
    public function takealeave() {
        return view('hr.leave.takealeave',['leavetypes'=>HrLeaveType::all()]);
    }

    public function leavehistory() {
        return view('hr.leave.leavehistory');
    }
    public function holidaycalender() {
        return view('hr.leave.holidaycalender');
    }
}
