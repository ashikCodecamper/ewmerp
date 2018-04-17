<?php

namespace App\Http\Controllers;
use Session;
use App\HrLeaveType;
use Illuminate\Http\Request;

class HrLeaveTypeController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('hr.leavetype.index',['leavetypes'=>HrLeaveType::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.leavetype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HrLeaveType::create([
          'leave_name' => $request->leave_name,
          'max_allowed_days' => $request->max_allowed_days
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('leavetype.index');
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
        $leavetype = HrLeaveType::find($id);
        return view('hr.leavetype.edit',['leavetype'=>$leavetype]);
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
            $leavetype = HrLeaveType::find($id);
            $leavetype->leave_name = $request->leave_name;
            $leavetype->max_allowed_days = $request->max_allowed_days;
            $leavetype->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('leavetype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      HrLeaveType::destroy($id);
      Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('leavetype.index');
    }
}
