<?php

namespace App\Http\Controllers;

use App\Jobapplication;
use Illuminate\Http\Request;

class JobapplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Jobapplication::all();
        return view('hr.jobopenning',['jobs'=>$jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jobapplication = new Jobapplication;
        $jobapplication->job_title = $request->job_title;
        $jobapplication->job_deadline = $request->job_deadline;
        $jobapplication->job_desc = $request->job_desc;
        $jobapplication->status = $request->status;
        $jobapplication->_wysihtml5_mode = $request->_wysihtml5_mode;
        $jobapplication->save();
        return redirect(route('jobopenning'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobapplication  $jobapplication
     * @return \Illuminate\Http\Response
     */
    public function show(Jobapplication $jobapplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobapplication  $jobapplication
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobapplication $jobapplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobapplication  $jobapplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobapplication $jobapplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobapplication  $jobapplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobapplication $jobapplication)
    {
        //
    }
}
