<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class CheckInOutController extends Controller
{
    public function checkin() {
      return view('attend.checkin',['time'=>Carbon::now()]);
    }

    public function checkout() {
      return view('attend.checkout',['time'=>Carbon::now()]);
    }
}
