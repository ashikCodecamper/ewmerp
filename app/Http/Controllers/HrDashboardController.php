<?php

namespace App\Http\Controllers;

class HrDashboardController extends Controller
{
    public function index()
    {
        return view('hr.dashboard');
    }
}
