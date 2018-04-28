<?php

namespace App\Http\Controllers;
use App\GracePeriod;
use App\OfficeInTime;
use App\OfficeOutTime;
use Session;
use Illuminate\Http\Request;

class AttendanceSettingController extends Controller
{
    public function officetime() {
      return view('hr.officesetting.officetime');
    }
    public function saveofficetime(Request $request) {
      $inTime = new OfficeInTime;
      $inTime->in_time =date('Y-m-d H:i:s', strtotime($request->in_time));
      $inTime->save();
      Session::flash('success', 'Successfully Created!');
      return redirect(route('officetime'));
    }
    public function showofficetime() {
      $inTime = OfficeInTime::all();
      return view('hr.officesetting.showofficetime',['intime'=>$inTime]);
    }
    public function officeouttime() {
      
      return view('hr.officesetting.officeouttime');
    }
    public function saveofficeouttime(Request $request) {
      $outtime = new OfficeOutTime;
      $outtime->out_time = date('Y-m-d H:i:s', strtotime($request->out_time));
      $outtime->save();
      Session::flash('success', 'Successfully Created!');
      return redirect()->route('hrdashboard');
    }
    public function graceperiod() {

      return view('hr.officesetting.graceperiod');
    }
    public function savegraceperiod(Request $request) {
      $grace = new GracePeriod;
      $grace->grace_period = $request->grace_period;
      $grace->save();
    }
}
