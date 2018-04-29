<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SealFour;
use DB;

class SealFourController extends Controller
{
  public function index()
  {
      $sealones = SealFour::all();
      return view('pcp.seal.bulksample.index', compact('sealones'));
  }
  public function create()
  {
    $lab_dips_id = DB::table('seal_twos')->where('status', 1)->pluck('proto_id'); //sealtwo proto_id
    $stwo = DB::table('sealones')->where('status', 1)->pluck('proto_id'); //seal one proto_id
    $stre = DB::table('seal_threes')->where('status', 1)->pluck('proto_id'); //seal three

    $all = $lab_dips_id->intersect($stwo); //making the common
    $all = $all->intersect($stre);

    //return $all;
    $data = \App\DcpStepTwo::where('status', 1);

    $f = DB::table('seal_fours')->pluck('proto_id');

    $all = $all->diff($f);
    //return $all;

    $protos = $data->whereIn('source_id', $all)->get();
    //return $protos;
    return view('pcp.seal.bulksample.create', compact('protos'));
  }


  public function store(Request $request)
 {

    $sealone = new SealFour;
    $sealone->proto_id = $request->proto;
    $sealone->plan_date = $request->plandate;
    $sealone->submission_date = $request->actsum;
    $sealone->awb_details = $request->awb;
    $sealone->comment = $request->comment;
    $sealone->comment_date = $request->cmntdate;
    $sealone->rev_comment = $request->rev_comment;

    $sealone->save();

    return redirect()->route('seal04.index');
 }

 public function edit(Request $request)
 {
   $id = $request->id;
   $seal_ones = SealFour::find($id);

   $lab_dips_id = DB::table('seal_twos')->where('status', 1)->pluck('proto_id'); //sealtwo proto_id
   $stwo = DB::table('sealones')->where('status', 1)->pluck('proto_id'); //seal one proto_id
   $stre = DB::table('seal_threes')->where('status', 1)->pluck('proto_id'); //seal three

   $all = $lab_dips_id->intersect($stwo); //making the common
   $all = $all->intersect($stre);

   //return $all;
   $data = \App\DcpStepTwo::where('status', 1);

   $protos = $data->whereIn('source_id', $all)->get();

   return view('pcp.seal.bulksample.edit', compact('seal_ones', 'protos'));
 }

 public function editsave(Request $request)
 {
   $id = $request->id;
   $sealone = SealFour::find($id);
   //return $sealone;

   $sealone->proto_id = $request->proto;
   $sealone->plan_date = $request->plandate;
   $sealone->submission_date = $request->actsum;
   $sealone->awb_details = $request->awb;
   $sealone->comment = $request->comment;
   $sealone->comment_date = $request->cmntdate;
   $sealone->rev_comment = $request->rev_comment;

   $sealone->save();

   return redirect()->route('seal04.index');
 }

 public function approve(Request $request)
 {
   $step =SealFour::find($request->id);
   $step->status = !$step->status;
   $step->save();
   return redirect()->route('seal04.index');

 }

 public function reject (Request $request)
 {
       $step = SealFour::find($request->id);
       //return $step;
       $sealone_reject = new \App\SealFourReject;

       $sealone_reject->sealfour_id = $step->id;
       $sealone_reject->proto_id = $step->proto_id;
       $sealone_reject->plan_date = $step->plan_date;
       $sealone_reject->submission_date = $step->submission_date;
       $sealone_reject->awb_details = $step->awb_details;
       $sealone_reject->comment = 'Rejected';
       $sealone_reject->comment_date = $step->comment_date;
       $sealone_reject->rev_comment = $step->rev_comment;
       $sealone_reject->save();

       return redirect()->route('seal04.edit', [ 'id' => $request->id]);
 }

 public function rejectlog(Request $request)
 {
   //return $request->id;
   $step = SealFour::find($request->id);
   return $step->rejects;
 }
}
