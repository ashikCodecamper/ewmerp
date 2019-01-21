<?php

namespace App\Http\Controllers\Cmp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmpSmetaController extends Controller
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
        $url = request()->url();
        $id = explode('/', $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.smeta.create', compact('s'));
    }

    public function store(Request $request)
    {
        $url = request()->url();
        $id = explode('/', $url)[5];
        $su = \App\CmpSupplier::find($id);

        $s = new \App\CmpSmeta();
        $s['supplier_id'] = $id;
        $s['smetaZsNumber'] = $request->smeta_zs;
        $s['smetaZcNumber'] = $request->smeta_zc;
        $s['smetaExpiryDate'] = $request->smeta_expiry;
        $s->save();

        return redirect(route('auditCreate', $id));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $url = request()->url();
        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        return view('cmp.smeta.edit', compact('s'));
    }

    public function edits(Request $request)
    {
        $url = request()->url();
        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        $s->smeta['smetaZsNumber'] = $request->smeta_zs;
        $s->smeta['smetaZcNumber'] = $request->smeta_zc;
        $s->smeta['smetaExpiryDate'] = $request->smeta_expiry;
        $s->smeta->save();

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
