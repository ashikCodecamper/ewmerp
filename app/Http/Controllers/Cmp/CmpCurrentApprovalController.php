<?php

namespace App\Http\Controllers\Cmp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CmpCurrentApprovalController extends Controller
{
    public function create()
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.approval.create', compact('s'));
    }

    public function store(Request $request)
    {

        $url = request()->url();
        $id = explode("/", $url)[5];

        $s = \App\CmpSupplier::find($id);

        $a = new \App\CmpCurrentApproval;

        $a['supplier_id'] = $id;
        $a['sedex_auditdate'] = $request->sedex_auditdate;
        $a['sedex_expirydate'] = $request->sedex_expirydate;

        $a['bsci_auditdate'] = $request->bsci_auditdate;
        $a['bsci_expirydate'] = $request->bsci_expirydate;
        $a['wrap_auditdate'] = $request->wrap_auditdate;
        $a['wrap_expirydate'] = $request->wrap_expirydate;
        $a['ics_auditdate'] = $request->ics_auditdate;
        $a['ics_expirydate'] = $request->ics_expirydate;
        $a->save();

        return redirect(route('cmpHome'));
    }

    public function edit()
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.approval.edit', compact('s'));
    }

    public function edits(Request $request)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $s = \App\CmpSupplier::find($id);
        $s->approval['sedex_auditdate'] = $request->sedex_auditdate;
        $s->approval['sedex_expirydate'] = $request->sedex_expirydate;

        $s->approval['bsci_auditdate'] = $request->bsci_auditdate;
        $s->approval['bsci_expirydate'] = $request->bsci_expirydate;
        $s->approval['wrap_auditdate'] = $request->wrap_auditdate;
        $s->approval['wrap_expirydate'] = $request->wrap_expirydate;
        $s->approval['ics_auditdate'] = $request->ics_auditdate;
        $s->approval['ics_expirydate'] = $request->ics_expirydate;
        $s->approval->save();

        return redirect(route('cmpHome'));
    }
}
