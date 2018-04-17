<?php

namespace App\Http\Controllers;
use App\HrDepartment;
use Illuminate\Http\Request;
use Session;
class HrDepartmentController extends Controller
{
     public function index()
    {
        return view('hr.department.index',['deps'=>HrDepartment::orderBy('dep_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HrDepartment::create([
          'dep_name' => $request->dep_name
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department = HrDepartment::find($id);
        return view('hr.department.edit',['department'=>$department]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $department = HrDepartment::find($id);
            $department->dep_name = $request->dep_name;
            $department->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      HrDepartment::destroy($id);
      Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('department.index');
    }
}
