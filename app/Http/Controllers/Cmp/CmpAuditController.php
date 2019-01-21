<?php

namespace App\Http\Controllers\Cmp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmpAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = request()->url();
        $id = explode('/', $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.audit.create', compact('s'));
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
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        $a = new \App\CmpAudit();

        $a['smeta_id'] = $s->smeta->id;
        $a['smetaAuditDate'] = $request->smeta_date;
        $a['smetaNextAuditDate'] = $request->smeta_nextdate;
        $a['semtaNumberOfCap'] = $request->smeta_cap;
        $a['smetaClosingDate'] = $request->smeta_close;
        $a->save();

        return redirect(route('auditcapCreate', $id));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        return view('cmp.audit.edit', compact('s'));
    }

    public function edits(Request $request)
    {
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        $s->smeta->audit['smeta_id'] = $s->smeta->id;
        $s->smeta->audit['smetaAuditDate'] = $request->smeta_date;
        $s->smeta->audit['smetaNextAuditDate'] = $request->smeta_nextdate;
        $s->smeta->audit['semtaNumberOfCap'] = $request->smeta_cap;
        $s->smeta->audit['smetaClosingDate'] = $request->smeta_close;
        $s->smeta->audit->save();

        return redirect(route('cmpHome'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
