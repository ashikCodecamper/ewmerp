<?php

namespace App\Http\Controllers;

use App\Dcpstepone;
use App\DcpStepTwo;
use App\SealOne;
use DB;
use Illuminate\Http\Request;

class SealOneController extends Controller
{
    public function index()
    {
        $sealones = SealOne::all();

        return view('pcp.seal.red-seal.index', compact('sealones'));
    }

    public function create()
    {
        $lab_dips_id = DB::table('sealones')->pluck('proto_id');

        $data = DcpStepTwo::where('status', 1);
        //return $data;
        $protos = $data->whereNotIn('source_id', $lab_dips_id)->get();
        //return $protos;

        return view('pcp.seal.red-seal.create', compact('protos'));
    }

    public function store(Request $request)
    {
        $sealone = new SealOne();
        $sealone->proto_id = $request->proto;
        $sealone->seal_type = $request->sealtype;
        $sealone->plan_date = date('Y-m-d', strtotime($request->plandate));
        $sealone->submission_date = date('Y-m-d', strtotime($request->actsum));
        $sealone->awb_details = $request->awb;
        $sealone->comment = $request->comment;
        $sealone->comment_date = date('Y-m-d', strtotime($request->cmntdate));
        $sealone->rev_comment = $request->rev_comment;

        $sealone->save();

        return redirect()->route('seal01.index');
    }

    public function exfactory(Request $request)
    {
        $id = $request->id;
        $dcp = Dcpstepone::find($id)->orderprocess->first();

        $response = [];
        $response['exfactory'] = $dcp->ex_factory_date;

        return json_encode($response);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $seal_ones = SealOne::find($id);
        $protos = DcpStepTwo::where('status', 1)->get();

        return view('pcp.seal.red-seal.edit', compact('seal_ones', 'protos'));
    }

    public function editsave(Request $request)
    {
        $id = $request->id;
        $sealone = SealOne::find($id);

        $sealone->proto_id = $request->proto;
        $sealone->seal_type = $request->sealtype;
        $sealone->plan_date = date('Y-m-d', strtotime($request->plandate));
        $sealone->submission_date = date('Y-m-d', strtotime($request->actsum));
        $sealone->awb_details = $request->awb;
        $sealone->comment = $request->comment;
        $sealone->comment_date = date('Y-m-d', strtotime($request->cmntdate));
        $sealone->rev_comment = $request->rev_comment;

        $sealone->save();

        return redirect()->route('seal01.index');
    }

    public function approve(Request $request)
    {
        $step = SealOne::find($request->id);
        $step->status = !$step->status;
        $step->save();

        return redirect()->route('seal01.index');
    }

    public function reject(Request $request)
    {
        $step = SealOne::find($request->id);
        //return $step;
        $sealone_reject = new \App\SealoneReject();

        $sealone_reject->sealone_id = $step->id;
        $sealone_reject->proto_id = $step->proto_id;
        $sealone_reject->seal_type = $step->seal_type;
        $sealone_reject->plan_date = date('Y-m-d', strtotime($step->plan_date));
        $sealone_reject->submission_date = date('Y-m-d', strtotime($step->submission_date));
        $sealone_reject->awb_details = $step->awb_details;
        $sealone_reject->comment = 'Rejected';
        $sealone_reject->comment_date = date('Y-m-d', strtotime($step->comment_date));
        $sealone_reject->rev_comment = $step->rev_comment;
        $sealone_reject->save();

        return redirect()->route('seal101.edit', ['id' => $request->id]);
    }

    public function rejectlog(Request $request)
    {
        //return $request->id;
        $step = SealOne::find($request->id);

        return $step->rejects;
    }
}
