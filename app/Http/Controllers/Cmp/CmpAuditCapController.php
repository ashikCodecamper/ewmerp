<?php

namespace App\Http\Controllers\Cmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmpAuditCapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url = request()->url();

        $id = explode("/", $url)[5];
        $s = \App\CmpSupplier::find($id);

        $caps = $s->smeta->audit->caps;

        return view('cmp.auditcap.index', compact('caps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = request()->url();
        
        $id = explode("/", $url)[5];
        $s = \App\CmpSupplier::find($id);

        return view('cmp.auditcap.create', compact('s'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $url = request()->url();
        
        $id = explode("/", $url)[5];
        $s = \App\CmpSupplier::find($id);

        $c = new \App\CmpAuditCap();

        $c['audit_id'] = $s->smeta->audit->id;
        $c['description'] = $request->cap_description;
        $c['timeline'] = $request->cap_timeline;
        $c['validationByThirdParty'] = ($request->cap_valid == "on" ? 1 : 0);
        $c['comments'] = $request->smeta_cap;
        $c->save();

        return redirect(route('auditCaps', ['id'=>$id]));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
