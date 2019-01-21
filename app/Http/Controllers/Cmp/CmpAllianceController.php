<?php
/**
 * Created by PhpStorm.
 * User: rsuit
 * Date: 1/28/2018
 * Time: 4:42 PM.
 */

namespace App\Http\Controllers\Cmp;

use App\CmpAccordAlliance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmpAllianceController extends Controller
{
    public function index()
    {
        $url = request()->url();

        $id = explode('/', $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.alliance.index', compact('s'));
    }

    public function create()
    {
        $url = request()->url();

        $id = explode('/', $url)[5];

        $s = \App\CmpSupplier::find($id);

        return view('cmp.alliance.create', compact('s'));
    }

    public function store(Request $request)
    {
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        $a = new CmpAccordAlliance();

        $a['supplier_id'] = $s->id;
        $a['bsPercentage'] = $request->building_safety;
        $a['bsPercentageE'] = $request->building_safetye;
        $a['fsPercentage'] = $request->fire_safety;
        $a['fsPercentageE'] = $request->fire_safetye;
        $a['esPercentage'] = $request->electrical_safety;
        $a['esPercentageE'] = $request->electrical_safetye;

        $a->save();

        return redirect(route('approval.create', ['id' => $id]));
    }

    public function edit()
    {
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        return view('cmp.alliance.edit', compact('s'));
    }

    public function edits(Request $request)
    {
        $url = request()->url();

        $id = explode('/', $url)[5];
        $s = \App\CmpSupplier::find($id);

        $s->alliance['bsPercentage'] = $request->building_safety;
        $s->alliance['bsPercentageE'] = $request->building_safetye;
        $s->alliance['fsPercentage'] = $request->fire_safety;
        $s->alliance['fsPercentageE'] = $request->fire_safetye;
        $s->alliance['esPercentage'] = $request->electrical_safety;
        $s->alliance['esPercentageE'] = $request->electrical_safetye;

        $s->alliance->save();

        return redirect(route('cmpHome'));
    }
}
