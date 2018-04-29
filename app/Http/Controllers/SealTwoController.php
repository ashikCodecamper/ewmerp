<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dcpsteptwo;
use App\Dcpstepone;
use App\SealTwo;
use Carbon\Carbon;
use App\SealOne;
use DB;

class SealTwoController extends Controller
{
    public function index()
    {
        $sealones = SealTwo::all();
        return view('pcp.seal.black-seal.index', compact('sealones'));
    }
    public function create()
    {
        $lab_dips_id = DB::table('seal_twos')->pluck('proto_id');

        $data = Dcpsteptwo::where('status', 1);

        $protos = $data->whereNotIn('source_id', $lab_dips_id)->get();
		return view('pcp.seal.black-seal.create', compact('protos'));
    }


    public function store(Request $request)
   {

      $sealone = new SealTwo;
      $sealone->proto_id = $request->proto;
      $sealone->seal_type = $request->sealtype;
      $sealone->plan_date = $request->plandate;
      $sealone->submission_date = $request->actsum;
      $sealone->awb_details = $request->awb;
      $sealone->comment = $request->comment;
      $sealone->comment_date = $request->cmntdate;
      $sealone->rev_comment = $request->rev_comment;

      $sealone->save();

      return redirect()->route('seal02.index');
   }

   public function edit(Request $request)
   {
     $id = $request->id;
     $seal_ones = SealTwo::find($id);
     $protos = Dcpsteptwo::where('status', 1)->get();

     return view('pcp.seal.black-seal.edit', compact('seal_ones', 'protos'));
   }

   public function editsave(Request $request)
   {
     $id = $request->id;
     $sealone = SealTwo::find($id);
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

     return redirect()->route('seal02.index');
   }

   public function approve(Request $request)
   {
     $step =SealTwo::find($request->id);
     $step->status = !$step->status;
     $step->save();
     return redirect()->route('seal02.index');

   }

   public function reject (Request $request)
   {
         $step = SealTwo::find($request->id);
         //return $step;
         $sealone_reject = new \App\SealTwoReject;

         $sealone_reject->sealtwo_id = $step->id;
         $sealone_reject->proto_id = $step->proto_id;
         $sealone_reject->seal_type = $step->seal_type;
         $sealone_reject->plan_date = $step->plan_date;
         $sealone_reject->submission_date = $step->submission_date;
         $sealone_reject->awb_details = $step->awb_details;
         $sealone_reject->comment = 'Rejected';
         $sealone_reject->comment_date = $step->comment_date;
         $sealone_reject->rev_comment = $step->rev_comment;
         $sealone_reject->save();

         return redirect()->route('seal02.edit', [ 'id' => $request->id]);
   }

   public function rejectlog(Request $request)
   {
     //return $request->id;
     $step = SealTwo::find($request->id);
     return $step->rejects;
   }
}
