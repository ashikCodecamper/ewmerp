<?php

namespace App\Http\Controllers;

use App\DcpBrand;
use Illuminate\Http\Request;
use Session;

class DcpBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dcp.brand.index', ['brands'=>DcpBrand::orderBy('brand_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dcp.brand.create');
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
        DcpBrand::create([
          'brand_name' => $request->brand_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DcpBrand $dcpBrand
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DcpBrand $dcpBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DcpBrand $dcpBrand
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = DcpBrand::find($id);

        return view('dcp.brand.edit', ['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DcpBrand            $dcpBrand
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = DcpBrand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DcpBrand $dcpBrand
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpBrand::destroy($id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('brand.index');
    }
}
