<?php

namespace App\Http\Controllers;

use App\DcpProductstype;
use Illuminate\Http\Request;
use Session;

class DcpProductstypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dcp.productype.index', ['type_name'=>DcpProductstype::orderBy('type', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dcp.productype.create');
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
        DcpProductstype::create([
          'type' => $request->type_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('productstype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DcpProductstype $dcpProductstype
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DcpProductstype $dcpProductstype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DcpProductstype $dcpProductstype
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = DcpProductstype::find($id);

        return view('dcp.productype.edit', ['type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DcpProductstype     $dcpProductstype
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $type = DcpProductstype::find($id);
        $type->type = $request->type_name;
        $type->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('productstype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DcpProductstype $dcpProductstype
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpProductstype::destroy($id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('productstype.index');
    }
}
