<?php

namespace App\Http\Controllers;
use Storage;
use App\Jobapplicant;
use Illuminate\Http\Request;

class JobapplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        return view('hr.jobapplicant.index',['jobapplicants'=>Jobapplicant::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobapplicant  $jobapplicant
     * @return \Illuminate\Http\Response
     */
    public function show(Jobapplicant $jobapplicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobapplicant  $jobapplicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobapplicant $jobapplicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobapplicant  $jobapplicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobapplicant $jobapplicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobapplicant  $jobapplicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobapplicant $jobapplicant)
    {
        //
    }
}
