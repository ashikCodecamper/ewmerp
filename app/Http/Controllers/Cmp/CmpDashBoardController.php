<?php

namespace App\Http\Controllers\Cmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmpDashBoardController extends Controller
{
    //shows the database
    public function index()
    {
        $suppliers = \App\CmpSupplier::all();
        return view('cmp.dashboard_index', compact('suppliers'));
    }

    public function show($id)
    {

    }

}
