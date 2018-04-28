<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attend;

class ShowHrAttend extends Controller
{
    public function index() {
      return view('hr.attend',['attends'=>Attend::all()]);
    }
}
