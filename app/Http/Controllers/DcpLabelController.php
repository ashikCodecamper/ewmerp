<?php

namespace App\Http\Controllers;

use App\DcpBrand;
use App\DcpLabel;
use Illuminate\Http\Request;
use Session;

class DcpLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plabel = DcpLabel::join('dcp_brands', 'dcp_labels.brand_id', '=', 'dcp_brands.id')
                  ->select('dcp_labels.label_name', 'dcp_brands.brand_name', 'dcp_labels.id')
                  ->getQuery()
                  ->get();

        return view('dcp.label.index', compact('plabel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = DcpBrand::all();

        return view('dcp.label.create', compact('brand'));
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
        DcpLabel::create([
          'brand_id'              => $request->brand,
          'label_name'            => $request->lab_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('label.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DcpLabel $dcpLabel
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DcpLabel $dcpLabel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DcpLabel $dcpLabel
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dcplabel = DcpLabel::find($id);
        $dcpbrand = DcpBrand::all();

        return view('dcp.label.edit', ['dcplabel'=>$dcplabel, 'dcpbrand'=>$dcpbrand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DcpLabel            $dcpLabel
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dcplabel = DcpLabel::find($id);
        $dcplabel->brand_id = $request->brand;
        $dcplabel->label_name = $request->lab_name;
        $dcplabel->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('label.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DcpLabel $dcpLabel
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpLabel::destroy($id);
        Session::flash('success', 'Successfully Deleted !');

        return redirect()->route('label.index');
    }
}
