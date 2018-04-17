<?php

namespace App\Http\Controllers;
use Session;
use App\EmploymentType;
use Illuminate\Http\Request;

class HrEmpController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('hr.emptype.index',['emptypes'=>EmploymentType::orderBy('emp_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.emptype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EmploymentType::create([
          'emp_name' => $request->emp_name
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('emptype.index');
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
        $emptype = EmploymentType::find($id);
        return view('hr.emptype.edit',['emptype'=>$emptype]);
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
            $emptype = EmploymentType::find($id);
            $emptype->emp_name = $request->emp_name;
            $emptype->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('emptype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      EmploymentType::destroy($id);
      Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('emptype.index');
    }
}
