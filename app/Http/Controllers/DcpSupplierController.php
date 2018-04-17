<?php

namespace App\Http\Controllers;

use App\DcpSupplier;
use Illuminate\Http\Request;
use Session;

class DcpSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sups=DcpSupplier::all();
        return view('dcp.supplier.index',compact('sups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dcp.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'sup_name'=>'required'
        ]);
        $dsup=new DcpSupplier();
        $dsup->supplier_name=$request->sup_name;
        $dsup->save();
        return redirect(route('supplier.index'));
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DcpSupplier  $dcpSupplier
     * @return \Illuminate\Http\Response
     */
    public function show(DcpSupplier $dcpSupplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DcpSupplier  $dcpSupplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier=DcpSupplier::find($id);
        return view('dcp.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DcpSupplier  $dcpSupplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $supplier = DcpSupplier::find($id);
            $supplier->supplier_name = $request->sup_name;
            $supplier->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DcpSupplier  $dcpSupplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpSupplier::destroy($id);
       Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('supplier.index');
    }
}
