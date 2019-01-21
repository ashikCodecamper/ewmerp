<?php

namespace App\Http\Controllers;

use App\DcpProductCategory;
use App\DcpProductstype;
use Illuminate\Http\Request;
use Session;

class DcpProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pcat = DcpProductCategory::join('dcp_productstypes', 'dcp_product_categories.dcproductype_id', '=', 'dcp_productstypes.id')
                  ->select('dcp_product_categories.name', 'dcp_productstypes.type', 'dcp_product_categories.id')
                  ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
                  ->get();

        return view('dcp.productcategory.index', compact('pcat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptype = DcpProductstype::all();

        return view('dcp.productcategory.create', compact('ptype'));
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
        DcpProductCategory::create([
          'dcproductype_id' => $request->product_type,
          'name'            => $request->cat_name,
        ]);
        Session::flash('success', 'Successfully Created!');

        return redirect()->route('productcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DcpProductCategory $dcpProductCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DcpProductCategory $dcpProductCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DcpProductCategory $dcpProductCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dcpcat = DcpProductCategory::find($id);
        $dcptype = DcpProductstype::all();

        return view('dcp.productcategory.edit', ['dcpcat'=>$dcpcat, 'dcptype'=>$dcptype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DcpProductCategory  $dcpProductCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dcpcat = DcpProductCategory::find($id);
        $dcpcat->dcproductype_id = $request->product_type;
        $dcpcat->name = $request->cat_name;
        $dcpcat->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('productcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DcpProductCategory $dcpProductCategory
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpProductCategory::destroy($id);
        Session::flash('success', 'Successfully Deleted!');

        return redirect()->route('productcategory.index');
    }
}
