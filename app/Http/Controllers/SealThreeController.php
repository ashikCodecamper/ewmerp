<?php

namespace App\Http\Controllers;

use App\DcpStepTwo;
use App\LabDip;
use App\SealThree;
use App\SealTwo;
use DB;
use Illuminate\Http\Request;

class SealThreeController extends Controller
{
    public function index()
    {
        $sealones = SealThree::all();

        return view('pcp.seal.gold-seal.index', compact('sealones'));
    }

    public function create()
    {
        // $l = Labdip::all();
        //
        // $la = collect();
        //
        // foreach ($l as $lab) {
        //     $lab->
        // }

        $lab_dips_id = DB::table('seal_twos')->where('status', 1)->pluck('proto_id'); //sealtwo proto_id
        $stwo = DB::table('sealones')->where('status', 1)->pluck('proto_id'); //seal one proto_id

        $all = $lab_dips_id->intersect($stwo); //making the common

        //return $all;
        $data = DcpStepTwo::where('status', 1);

        $sthree = DB::table('seal_threes')->pluck('proto_id');
        //return $sthree;

        $all = $all->diff($sthree);
        //return $all;

        $protos = $data->whereIn('source_id', $all)->get();

        return view('pcp.seal.gold-seal.create', compact('protos'));
    }

    public function store(Request $request)
    {
        $sealone = new SealThree();
        $sealone->proto_id = $request->proto;
        $sealone->seal_type = $request->sealtype;
        $sealone->plan_date = $request->plandate;
        $sealone->submission_date = $request->actsum;
        $sealone->awb_details = $request->awb;
        $sealone->comment = $request->comment;
        $sealone->comment_date = $request->cmntdate;
        $sealone->rev_comment = $request->rev_comment;

        $sealone->save();

        return redirect()->route('seal03.index');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $seal_ones = SealThree::find($id);

        $lab_dips_id = DB::table('seal_twos')->where('status', 1)->pluck('proto_id');
        $stwo = DB::table('sealones')->where('status', 1)->pluck('proto_id');

        $all = $lab_dips_id->intersect($stwo);

        $data = DcpStepTwo::where('status', 1);

        $protos = $data->whereIn('source_id', $all)->get();

        return view('pcp.seal.gold-seal.edit', compact('seal_ones', 'protos'));
    }

    public function editsave(Request $request)
    {
        $id = $request->id;
        $sealone = SealThree::find($id);
        //return $sealone;

        $sealone->proto_id = $request->proto;
        $sealone->seal_type = $request->sealtype;
        $sealone->plan_date = $request->plandate;
        $sealone->submission_date = $request->actsum;
        $sealone->awb_details = $request->awb;
        $sealone->comment = $request->comment;
        $sealone->comment_date = $request->cmntdate;
        $sealone->rev_comment = $request->rev_comment;

        $sealone->save();

        return redirect()->route('seal03.index');
    }

    public function approve(Request $request)
    {
        $step = SealThree::find($request->id);
        $step->status = !$step->status;
        $step->save();

        return redirect()->route('seal03.index');
    }

    public function reject(Request $request)
    {
        $step = SealThree::find($request->id);
        //return $step;
        $sealone_reject = new \App\SealthreeReject();

        $sealone_reject->sealthree_id = $step->id;
        $sealone_reject->proto_id = $step->proto_id;
        $sealone_reject->seal_type = $step->seal_type;
        $sealone_reject->plan_date = $step->plan_date;
        $sealone_reject->submission_date = $step->submission_date;
        $sealone_reject->awb_details = $step->awb_details;
        $sealone_reject->comment = 'Rejected';
        $sealone_reject->comment_date = $step->comment_date;
        $sealone_reject->rev_comment = $step->rev_comment;
        $sealone_reject->save();

        return redirect()->route('seal03.edit', ['id' => $request->id]);
    }

    public function rejectlog(Request $request)
    {
        //return $request->id;
        $step = SealThree::find($request->id);

        return $step->rejects;
    }
}
