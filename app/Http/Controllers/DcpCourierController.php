<?php

namespace App\Http\Controllers;

use App\DcpCourier;
use Session;
use Illuminate\Http\Request;

class DcpCourierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('dcp.courier.index',['curname'=>DcpCourier::orderBy('courier_name', 'asc')->get()]);
        $dcpcur=DcpCourier::all();
        return view('dcp.courier.index',compact('dcpcur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dcp.courier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         DcpCourier::create([
          'courier_name'            =>$request->curer_name
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('courier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DcpCourier  $dcpCourier
     * @return \Illuminate\Http\Response
     */
    public function show(DcpCourier $dcpCourier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DcpCourier  $dcpCourier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $courier = DcpCourier::find($id);
        return view('dcp.courier.edit',['courier'=>$courier]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DcpCourier  $dcpCourier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $dcpcu = DcpCourier::find($id);
            $dcpcu->courier_name = $request->curer_name;
            $dcpcu->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('courier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DcpCourier  $dcpCourier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpCourier::destroy($id);
       Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('courier.index');
        
    }
}
