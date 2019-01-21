<?php

namespace App\Http\Controllers;

use App\HrJobOpenning;
use Illuminate\Http\Request;
use Session;

class HrJobOpenningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hr.jobopenning.index', ['jobopennings'=>HrJobOpenning::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.jobopenning.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HrJobOpenning::create([
          'job_title'      => $request->job_title,
          'job_deadline'   => $request->job_deadline,
          'job_vacancy'    => $request->job_vacancy,
          'edu_req'        => $request->edu_req,
          'job_nature'     => $request->job_nature,
          'exp_req'        => $request->exp_req,
          'job_description'=> $request->job_description,
          '_wysihtml5_mode'=> $request->_wysihtml5_mode,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('jobopenning.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobopenning = HrJobOpenning::find($id);

        return view('hr.jobopenning.edit', ['jobopenning'=>$jobopenning]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jobopenning = HrJobOpenning::find($id);
        $jobopenning->job_title = $request->job_title;
        $jobopenning->job_deadline = $request->job_deadline;
        $jobopenning->job_vacancy = $request->job_vacancy;
        $jobopenning->edu_req = $request->edu_req;
        $jobopenning->job_nature = $request->job_nature;
        $jobopenning->exp_req = $request->exp_req;
        $jobopenning->job_description = $request->job_description;
        $jobopenning->_wysihtml5_mode = $request->_wysihtml5_mode;
        $jobopenning->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('jobopenning.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HrJobOpenning::destroy($id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('jobopenning.index');
    }
}
