<?php

namespace App\Http\Controllers;
use DB;
use App\Attandance;
use App\Hremployee;
use Illuminate\Http\Request;

class AttandanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Hremployee::all();
        $attendances = DB::table('attandances')->join('hremployees', function ($join) {
            $join->on('hremployees.id', '=', 'attandances.employee_id');
        })->get();
        return view('hr.attendance',['attendances'=>$attendances,'employees'=>$employees]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attandances = new Attandance;
        $attandances-> employee_id=$request->employee_id;
        $attandances->status =$request->status;
        $attandances->attend_dates =$request->attend_dates;
        $attandances->save();
        return redirect(route('attandance'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function show(Attandance $attandance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attandance $attandance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attandance $attandance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attandance  $attandance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attandance $attandance)
    {
        //
    }
}
