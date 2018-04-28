<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use App\OfficeInTime;
use App\OfficeOutTime;
use App\GracePeriod;
use App\Attend;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CheckInOutController extends Controller
{
    public function checkin() {
      $checkin = OfficeInTime::first();
      $grace = GracePeriod::first();
    return view('attend.checkin',['time'=>Carbon::now(),'checkin'=>$checkin->in_time,'graceperiod'=>$grace->grace_period]);
    }

    public function savecheckin(Request $request) {
      $attend = new Attend;
      $attend->user_id = Auth::user()->id;
      $attend->in_time = $request->in_time;
      $attend->out_time = 'In Office';
      $attend->status = $request->status;
      $attend->save();
      Session::flash('success', 'Successfully Insert In Time!');
      return redirect()->route('hrdashboard');
    }

    public function checkout() {
      $out = OfficeOutTime::first();
      return view('attend.checkout',['out'=>$out->out_time]);
    }
    public function savecheckout(Request $request) {
      $checkout = Attend::where('user_id',Auth::User()->id)->get();
      $savecheckout = Attend::find($checkout[0]->id);
      $savecheckout->out_time = $request->out_time;
      $savecheckout->save();
      Session::flash('success', 'Successfully Insert Out Time!');
      return redirect()->route('hrdashboard');

    }
}
