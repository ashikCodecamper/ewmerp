<?php

namespace App\Http\Controllers;
use App\GracePeriod;
use App\OfficeInTime;
use App\OfficeOutTime;
use Illuminate\Http\Request;

class AttendanceSettingController extends Controller
{
    public function officetime() {
      return view('hr.officesetting.officetime');
    }
    public function saveofficetime(Request $request) {
      return $request->all();
    }
    public function officeouttime() {
      return view('hr.officesetting.officeouttime');
    }
    public function saveofficeouttime(Request $request) {
      return $request->all();
    }
    public function graceperiod() {
      return view('hr.officesetting.graceperiod');
    }
    public function savegraceperiod(Request $request) {
      return $request->all();
    }
}
