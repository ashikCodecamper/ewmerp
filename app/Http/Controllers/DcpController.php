<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DcpController extends Controller
{
    public function index() {
      return view('dcp.dashboard');
    }
}
