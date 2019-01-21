<?php

namespace App\Http\Controllers;

class DcpController extends Controller
{
    public function index()
    {
        return view('dcp.dashboard');
    }
}
