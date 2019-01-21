<?php

namespace App\Http\Controllers;

use App\user;
use App\Userprofile;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $employee = Userprofile::where('user_id', '=', $id)->first();

        return view('employee.index', ['id'=>$id, 'user'=>$user, 'employee'=>$employee]);
    }
}
