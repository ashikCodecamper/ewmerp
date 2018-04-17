<?php

namespace App\Http\Controllers\Cmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CmpSupplier;

class CmpSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cmp.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $s = new CmpSupplier();
        $s['name'] = $request->supplier_name;
        $s['corporateOfficeDetails'] = $request->supplier_corporate;
        $s['siteOfficeDetails'] = $request->supplier_site;
        $s['manaingDirectorDetails'] = $request->supplier_managing;
        $s['supplierFor'] = $request->supplier_for;
        $s['supplierNo'] = $request->supplier_no;
        $s['bankName']= $request->supplier_bank;
        $s['bankBranch'] = $request->supplier_bbranch;
        $s['bankAccountNo'] = $request->supplier_baccount;
        $s['bankAddress'] = $request->supplier_baddress;
        $s['bankSwift'] = $request->supplier_bswift;
        $s['bankIssue'] = ($request->supplier_bissue == "on" ? 1 : 0);
        $s['workIssue'] =($request->supplier_wissue == "on" ? 1 : 0);
        $s['outSourceProcess'] = $request->supplier_outsource;
        $s['totalWorkForce'] = $request->supplier_totalworkforce;
        $s['productionArea'] = $request->supplier_productionarea;
        $s['currentCustomer'] = $request->supplier_currentcustomer;
        $s->save();
        return redirect(route('smetaCreate', $s->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];


        $supplier = \App\CmpSupplier::find($id);

        return view('cmp.supplier.show', compact('supplier'));
    }


    public function edit()
    {
        $url = request()->url();
        $id = explode("/", $url)[5];
        $supplier = \App\CmpSupplier::find($id);


        return view('cmp.supplier.edit', compact('supplier'));
    }

    public function edits(Request $request)
    {

        $url = request()->url();
        $id = explode("/", $url)[5];
        $s = \App\CmpSupplier::find($id);


        $s['name'] = $request->supplier_name;
        $s['corporateOfficeDetails'] = $request->supplier_corporate;
        $s['siteOfficeDetails'] = $request->supplier_site;
        $s['manaingDirectorDetails'] = $request->supplier_managing;
        $s['supplierFor'] = $request->supplier_for;
        $s['supplierNo'] = $request->supplier_no;
        $s['bankName']= $request->supplier_bank;
        $s['bankBranch'] = $request->supplier_bbranch;
        $s['bankAccountNo'] = $request->supplier_baccount;
        $s['bankAddress'] = $request->supplier_baddress;
        $s['bankSwift'] = $request->supplier_bswift;
        $s['bankIssue'] = ($request->supplier_bissue == "on" ? 1 : 0);
        $s['workIssue'] =($request->supplier_wissue == "on" ? 1 : 0);
        $s['outSourceProcess'] = $request->supplier_outsource;
        $s['totalWorkForce'] = $request->supplier_totalworkforce;
        $s['productionArea'] = $request->supplier_productionarea;
        $s['currentCustomer'] = $request->supplier_currentcustomer;
        $s->save();

        return redirect(route('cmpHome'));
    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $s = \App\CmpSupplier::find($id);
        $s->delete();
        return redirect(route('cmpHome'));
    }
}
