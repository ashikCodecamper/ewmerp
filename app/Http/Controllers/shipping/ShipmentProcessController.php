<?php

namespace App\Http\Controllers\shipping;

use App\Http\Controllers\Controller;
use App\OrderProcess;
use App\RevisedExfactory;
use App\shipment;
use DB;
use Excel;
use Illuminate\Http\Request;
use Response;
use Validator;

class ShipmentProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $polists = DB::table('order_processes')
                ->join('dcpstepones', 'order_processes.srcno', '=', 'dcpstepones.id')
                ->join('dcp_step_twos', 'order_processes.srcno', '=', 'dcp_step_twos.source_id')
                ->join('dcp_seasons', 'dcpstepones.season_id', '=', 'dcp_seasons.id')
                ->join('dcp_suppliers', 'dcp_step_twos.supplier_id', '=', 'dcp_suppliers.id')
                ->leftJoin('shipments', 'order_processes.id', '=', 'shipments.order_id')
                ->select('order_processes.id', 'order_processes.quantity', 'order_processes.ex_factory_date', 'order_processes.color', 'dcp_step_twos.supplier_id', 'dcpstepones.proto', 'dcp_seasons.sea_name', 'dcpstepones.style_code', 'dcpstepones.prdct_des', 'dcp_suppliers.supplier_name')
                ->where('shipments.order_id', '=', null)
                ->get();

        //return $polists;

        $shipment_status = DB::table('shipments')
                         ->join('order_processes', 'shipments.order_id', '=', 'order_processes.id')
                         ->select('shipments.*')
                         ->get();

        return view('shipment.index', compact('polists', 'shipment_status'));
        // return $polists;
    }

    public function vessel_approval()
    {
        $polists = DB::table('order_processes')
                ->join('dcpstepones', 'order_processes.srcno', '=', 'dcpstepones.id')
                ->join('dcp_step_twos', 'order_processes.srcno', '=', 'dcp_step_twos.source_id')
                ->join('shipments', 'order_processes.id', '=', 'shipments.order_id')
                ->select('order_processes.po_number', 'order_processes.quantity', 'order_processes.ex_factory_date', 'dcpstepones.proto', 'dcp_step_twos.fob_price', 'shipments.*')
                ->get();

        $shipment_status = DB::table('shipments')
                         ->join('order_processes', 'shipments.order_id', '=', 'order_processes.id')
                         ->select('shipments.*')
                         ->get();

        //return $polists;

        return view('shipment.vessel_approval', compact('polists', 'shipment_status'));
    }

    public function ex_fact(Request $request)
    {
        $order = DB::table('order_processes')->where('id', $request->id)->get();

        return $order;
    }

    public function store_exfactory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oexfact'   => 'required|max:255',
            'revexfact' => 'required|max:255',
            'comment'   => 'required|min:10',
        ], [
            'oexfact.required'  => 'Enter Exfactory Date',
            'revexfact.required'=> 'Enter New Exfactory Date',
            'comment.required'  => 'Brief the Reason of change Ex-factory',

        ]);

        // $input = $request->all();
        $revixfact = new RevisedExfactory();
        if ($validator->passes()) {

            // Store your user in database

            $revixfact->ord_id = $request->id;
            $revixfact->previous_exfactory = $request->oexfact;
            $revixfact->new_exfactory = $request->revexfact;
            $revixfact->change_reason = $request->comment;
            $revixfact->save();

            // DB::table('order_processes')
            //      ->where('id', $request->id)
            //      ->update(['ex_factory_date',$request->revexfact]);

            $ordr = OrderProcess::find($request->id);
            $ordr->ex_factory_date = $request->revexfact;
            $ordr->warehouse_date = date('Y-m-d', strtotime($request->revexfact.'+42 days'));
            $ordr->save();

            return Response::json(['success' => '1']);
        }

        return Response::json(['errors' => $validator->errors()]);
    }

    public function store_vesselinfo(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vessel'  => 'required',
            'shipqty' => 'required|numeric',
            'ratio'   => 'required|max:255',
            'flat'    => 'required',
            'eta'     => 'required',
        ], [
            'vessel.required' => 'Enter Vessel Name',
            'shipqty.required'=> 'Enter Ship Quantity',
            'shipqty.numeric' => 'Enter numeric Ship Quantity',
            'ratio.required'  => 'Select an Option',
            'flat.required'   => 'Select an Option',
            'flat.required'   => 'Enter Date',

        ]);

        $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database
            $vessel = new shipment();
            $vessel->order_id = $request->id;
            $vessel->ship_qty = $request->shipqty;
            $vessel->ratio_backup = $request->ratio;
            $vessel->flat_hanging = $request->flat;
            $vessel->ETA_UK = $request->eta;
            $vessel->vessel_name = $request->vessel;
            $vessel->save();

            return Response::json(['success' => '1', 'data'=>$vessel]);
        }

        return Response::json(['errors' => $validator->errors()]);
    }

    public function revised_exfactory(Request $request)
    {
        $rvexfact = RevisedExfactory::where('ord_id', $request->id)->get();

        return $rvexfact;
    }

    public function get_shipmentinfo(Request $request)
    {
        $ord_id = $request->id;
        $data = DB::table('shipments')
                  ->join('order_processes', 'shipments.order_id', '=', 'order_processes.id')
                  ->select('shipments.id', 'shipments.order_id')
                  ->where('shipments.id', $ord_id)
                  ->get();

        return $data;
    }

    public function ok_ship(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'option' => 'required',

        ], [
            'id.required'    => 'This is not ready for Ship, Please Insert Information First',
            'option.required'=> 'Select Option',

        ]);

        // $input = $request->all();

        if ($validator->passes()) {

            // Store your user in database
            $okship = shipment::find($request->id);
            $okship->ok_to_ship = $request->option;
            $okship->save();

            return Response::json(['success' => '1', $okship]);
        }

        return Response::json(['errors' => $validator->errors()]);
    }

    public function vessel_list()
    {
        $shippinginfo = DB::table('order_processes')
                ->join('dcpstepones', 'order_processes.srcno', '=', 'dcpstepones.id')
                ->join('dcp_step_twos', 'order_processes.srcno', '=', 'dcp_step_twos.source_id')
                ->join('dcp_seasons', 'dcpstepones.season_id', '=', 'dcp_seasons.id')
                ->join('dcp_suppliers', 'dcp_step_twos.supplier_id', '=', 'dcp_suppliers.id')
                ->leftJoin('shipments', 'order_processes.id', '=', 'shipments.order_id')
                ->select('order_processes.id', 'order_processes.quantity', 'order_processes.ex_factory_date', 'order_processes.po_number', 'order_processes.color', 'dcp_step_twos.supplier_id', 'dcpstepones.proto', 'dcp_seasons.sea_name', 'dcpstepones.style_code', 'dcpstepones.prdct_des', 'dcp_suppliers.supplier_name', 'shipments.*', 'dcp_step_twos.fob_price')
                ->get();

        $shipment_status = DB::table('shipments')
                         ->join('order_processes', 'shipments.order_id', '=', 'order_processes.id')
                         ->select('shipments.*')
                         ->get();
        //return $shipment_status[0]->ok_to_ship;

        Excel::create('Vessel List', function ($excel) use ($shippinginfo,$shipment_status) {
            $excel->sheet('Vessel List', function ($sheet) use ($shippinginfo,$shipment_status) {
                $sheet->setOrientation('landscape');
                $sheet->loadView('shipment.vessel_excel', compact('shippinginfo', 'shipment_status'));
            });
        })->export('xls');
    }
}
