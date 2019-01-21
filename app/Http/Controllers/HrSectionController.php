<?php

namespace App\Http\Controllers;

use App\Hrsection;
use Illuminate\Http\Request;
use Session;

class HrSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hr.section.index', ['secs'=>Hrsection::orderBy('sec_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.section.create');
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
        Hrsection::create([
          'sec_name' => $request->sec_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('section.index');
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
        $section = Hrsection::find($id);

        return view('hr.section.edit', ['section'=>$section]);
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
        $section = Hrsection::find($id);
        $section->sec_name = $request->sec_name;
        $section->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('section.index');
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
        Hrsection::destroy($id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('section.index');
    }
}
