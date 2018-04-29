<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\DcpStepTwo;
use App\LabDip;
use App\LabdipColor;
use App\LabdipStep;
use Carbon\Carbon;
use App\OrderProcess;
use App\Dcpstepone;


class LabDipController extends Controller
{

    public function dashboard()
    {
      return view('pcp.dashboard.index');
    }
    public function index()
    {
        // $labdips= DB::table('labdips')
        // ->join('labdip_colors', 'labdips.id', 'labdip_colors.labdip_id')
        // ->join('labdip_steps', 'labdip_colors.id', '=', 'labdip_steps.color_id')
        // ->where('labdip_steps.step', '=', 1)
        // ->select('*')
        // ->get();

        $labdips = LabDip::all();


        return view('pcp.lab-dip.index',compact('labdips'));

    }

    public function create()
    {
      /*
        only showing the proto that's not in labdips already
      */

      $lab_dips_id = DB::table('labdips')->pluck('proto_id');

      $data=DB::table('dcp_step_twos')->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')->where('dcp_step_twos.status',1)->get();

      $data = $data->whereNotIn('id', $lab_dips_id);

      //return $data;

    	return view('pcp.lab-dip.create',compact('data'));
    }

    public function store(Request $request)
    {

        //return $request;

        $labdip = new LabDip();
        $labdip->proto_id = $request->proto;
        $labdip->save();

        $no_of_labdip = count($request->main_color);
        //return $no_of_labdip;

        for ($ldcounter = 0; $ldcounter < $no_of_labdip; $ldcounter++) {

          // saving one to many color for one labdip
          $labdip_color = new LabdipColor();

          $labdip_color->main_color = $request->main_color[$ldcounter];
          $labdip_color->sub_colors = $request->sub_color[$ldcounter];

          $labdip_color->order_process_id = $request->main_color_id[$ldcounter];

          $labdip_color->submission_date  =  $request->submissiondate[$ldcounter];
          $labdip_color->parcel_no        =  $request->trackno[$ldcounter];
          $labdip_color->uk_arrive_date   =  $request->arrivedate[$ldcounter];
          $labdip_color->uk_recieve_date  =  $request->rcvdate[$ldcounter];
          $labdip_color->first_submission_cmnt=  $request->firstsubmissioncmnt[$ldcounter];
          $labdip_color->comment_date = $request->comment_date[$ldcounter];
          $labdip_color->revised_comment = $request->rev_comment[$ldcounter];
          $labdip_color->poms_date = $request->pomsdate[$ldcounter];

          $labdip_color->labdip_id = LabDip::where('proto_id', $request->proto)->first()->id;
          $labdip_color->save();

          // now saving the each color step data
          // $labdip_step = new LabdipStep();
          // $labdip_step->color_id = $labdip_color->id;
          // $labdip_step->save();
        }


        return redirect()->route('labdip.index');
    }

    public function edit(Request $request)
    {
      $id = $request->id;
      $lcol = LabdipColor::find($id);
      return view('pcp.lab-dip.edit', compact('id'));
    }

    public function editsave(Request $request)
    {
          //return $request->all();

          $labdip_color = LabdipColor::find($request->id);

          $labdip_color->sub_colors = $request->sub_color;


          $labdip_color->submission_date  =  $request->submissiondate;
          $labdip_color->parcel_no        =  $request->trackno;
          $labdip_color->uk_arrive_date   =  $request->arrivedate;
          $labdip_color->uk_recieve_date  =  $request->rcvdate;
          $labdip_color->first_submission_cmnt=  $request->firstsubmissioncmnt;
          $labdip_color->comment_date = $request->comment_date;
          $labdip_color->revised_comment = $request->rev_comment;
          $labdip_color->poms_date = $request->pomsdates;

          $labdip_color->save();

          //return $Labdip_color;

          return redirect()->route('labdip.index');
    }

    public function exf(Request $request)
    {
      $id = $request->id;
      $lcol = LabdipColor::find($id);
      return $lcol->order_process->ex_factory_date;
    }

    public function color_info(Request $request)
    {
      $color = LabdipColor::find($request->id);
      return $color;
    }



    public function tcreate()
    {
      return view('pcp.seal.bulksample.create');
    }



    public function approve(Request $request)
    {
      $step = LabdipColor::find($request->id);
      $step->status = !$step->status;
      $step->save();
      return redirect()->route('labdip.index');

    }

    public function reject (Request $request)
    {
          $step = LabdipColor::find($request->id);

          $r = new \App\LabdipReject;

          $r->labdip_color_id = $step->id;
          $r->sub_colors = $step->sub_colors;
          $r->main_color = $step->main_color;

          $r->submission_date  =  $step->submission_date ;
          $r->parcel_no        =  $step->parcel_no;
          $r->uk_arrive_date   =  $step->uk_arrive_date ;
          $r->uk_recieve_date  =  $step->uk_recieve_date;
          $r->first_submission_cmnt=  'Rejected';
          $r->comment_date = $step->comment_date;
          $r->revised_comment = $step->revised_comment;
          $r->poms_date = $step->poms_date;

          $r->save();

          return redirect()->route('labdip.edit', [ 'id' => $request->id]);
    }

    public function rejectlog(Request $request)
    {
      $step = LabdipColor::find($request->id);
      return $step->rejects;

    }


    public function exfactory(Request $request)
    {
      $id = $request->id;


      $dcp = \App\Dcpstepone::find($id);


      $exfactory_date = new Carbon($dcp->proto_rcv_date);


      $tot;
      if ($dcp->source_type == 'local') {
        $tot = 90;
      } else {
        $tot = 120;
      }

      $exfactory_date = $exfactory_date->addDays($tot);

      $response  = array();
      $response['exfactory'] = $exfactory_date->toDateString();
      return json_encode($response);

    }

    public function colors (Request $request)
    {
      $id = $request->get('id');
      $dcp = Dcpstepone::find($id);

      return $dcp->orderprocess;
    }



}
