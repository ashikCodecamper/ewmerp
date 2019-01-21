<?php

namespace App\Http\Controllers;

use App\DcpStepTwo;
use App\FeedInTarget;
use DB;
use Illuminate\Http\Request;

class FeedInTargetController extends Controller
{
    public function index()
    {
        $sealones = FeedInTarget::all();

        return view('pcp.feedin.index', compact('sealones'));
    }

    public function create()
    {
        $lab_dips_id = DB::table('seal_twos')->where('status', 1)->pluck('proto_id'); //sealtwo proto_id
      $stwo = DB::table('sealones')->where('status', 1)->pluck('proto_id'); //seal one proto_id
      $stre = DB::table('seal_threes')->where('status', 1)->pluck('proto_id'); //seal three

      $all = $lab_dips_id->intersect($stwo); //making the common
        $all = $all->intersect($stre);

        //return $all;
        $data = DcpStepTwo::where('status', 1);

        $f = DB::table('feed_in_targets')->pluck('proto_id');

        $all = $all->diff($f);
        //return $all;

        $protos = $data->whereIn('source_id', $all)->get();
        //return $protos;
        return view('pcp.feedin.create', compact('protos'));
    }

    public function store(Request $request)
    {
        //return $request->all();
        $f = new FeedInTarget();
        $f->proto_id = $request->proto;
        $f->act_feed_date = $request->plandate;
        $f->feed_in_target = $request->targetdate;
        $f->save();

        return redirect()->route('feedin.index');
    }
}
