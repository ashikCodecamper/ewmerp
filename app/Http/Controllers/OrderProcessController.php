<?php

namespace App\Http\Controllers;

use App\DcpBrand;
use App\DcpSeason;
use App\DcpLabel;
use App\DcpProductCategory;
use App\Dcpstepone;
use Illuminate\Http\Request;
use Storage;
use File;
use DB;
use Session;
use App\DcpCourier;
use App\DcpStepTwo;
use App\DcpSupplier;
use App\OrderProcess;

class OrderProcessController extends Controller
{
    public function index()
    {
      $ordr=DB::table('order_processes')
             ->join('dcpstepones','order_processes.srcno','=','dcpstepones.id')
             ->select('dcpstepones.sl_no','dcpstepones.proto','order_processes.*')
             ->get();
    //  return $ordr;
     return view('dcp.order.index',compact('ordr'));
    }

    public function create()
    {
    	 $srcno=DB::table('dcp_step_twos')->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')->where('dcp_step_twos.status',1)->get();

    	return view('dcp.order.create',compact('srcno'));
    }

    public function store(Request $request)
    {
          $nofinsert=count($request->color);
           $insertdata=array();
           $i=0;

            while($i < $nofinsert){
         $insertdata[] = array(
             'srcno'      => $request->srcno,
             'po_number'  =>$request->ponumber,
             'po_sheet_rcv'=>$request->porcvdate,
             'color'      => $request->color[$i],
             'quantity'     => $request->qty[$i],
             'ETD'          =>$request->etd[$i],
             'ex_factory_date'     => $request->exfactdate[$i],
             'warehouse_date'     => $request->warehouse[$i],
             'ship_mode'          =>$request->shipmode[$i],


         );
         $i++;
     }
      DB::table('order_processes')->insert($insertdata);

      return redirect()->route('orderprocess.index');
    }

    public function edit($id)
    {
      $srcno=DB::table('dcp_step_twos')->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')->where('dcp_step_twos.status',1)->get();
      $orpro=OrderProcess::find($id);

    	return view('dcp.order.edit',compact('srcno','orpro'));
    }

    public function update(Request $request, $id)
    {
      $order=OrderProcess::find($id);
      $order->srcno=$request->srcno;
      $order->po_sheet_rcv=$request->porcvdate;
      $order->color=$request->color;
      $order->quantity=$request->qty;
      $order->ex_factory_date=$request->exfactdate;
      $order->warehouse_date=$request->warehouse;
      $order->save();
      Session::flash('success', 'Successfully Updated!');
      return redirect()->route('orderprocess.index');
    }

    public function delete($id)
    {
      OrderProcess::destroy($id);
      Session::flash('success','Successfully Deleted !');
      return redirect()->route('orderprocess.index');
    }

    public function show($id)
    {

    }
}
