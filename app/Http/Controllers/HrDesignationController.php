<?php

namespace App\Http\Controllers;

use App\HrDesignation;
use Illuminate\Http\Request;
use Session;

class HrDesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hr.designation.index', ['degs'=>HrDesignation::orderBy('deg_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.designation.create');
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
        HrDesignation::create([
          'deg_name' => $request->deg_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('designation.index');
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
        $designation = HrDesignation::find($id);

        return view('hr.designation.edit', ['designation'=>$designation]);
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
        $designation = HrDesignation::find($id);
        $designation->deg_name = $request->deg_name;
        $designation->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('designation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        HrDesignation::destroy($request->id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('designation.index');
    }
}
