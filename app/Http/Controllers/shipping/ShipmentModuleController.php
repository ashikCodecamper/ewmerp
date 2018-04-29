<?php

namespace App\Http\Controllers\shipping;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderProcess;
use DB;
use Validator;
use Response;
use App\RevisedExfactory;
use App\shipment;
use App\shipment_module;
use Excel;

class ShipmentModuleController extends Controller
{

	function __construct()
	{
		$this->middleware('auth');
	}

    public function dashboard()
    {
    	return view('shipment.dashboard');
    }

    public function index()
    {
    	$polists=DB::table('order_processes')
                ->join('dcpstepones','order_processes.srcno','=','dcpstepones.id')
                ->join('dcp_step_twos','order_processes.srcno','=','dcp_step_twos.source_id')
                ->join('shipments','order_processes.id','=','shipments.order_id')
                ->leftJoin('shipment_modules','shipments.id','=','shipment_modules.shipment_id')
                ->select('order_processes.po_number','order_processes.quantity','order_processes.ex_factory_date','dcpstepones.proto','dcp_step_twos.fob_price','shipments.*','dcpstepones.proto','shipment_modules.sms_status')
                ->where('ok_to_ship','YES')
                ->get();

                //return $polists;
       
    	return view('shipment-module.index',compact('polists'));
    }

    public function shipment_info(Request $request)
    {
    	 $validator = Validator::make($request->all(), [
            'inv' => 'required|max:255',
            'docdate' => 'required',
            'authdate' => 'required',
            'paydate' => 'required',
        ],[
            'inv.required'=>'Enter Invoice Number',
            'docdate.required'=>'Enter Date',
            'authdate.required'=>'Enter Date',
            'paydate.required'=>'Enter Date',


        ]);

       // $input = $request->all();
           
        if ($validator->passes()) {

            // Store your user in database 
            $smm=new shipment_module;
            $smm->shipment_id=$request->id;
            $smm->doc_send_date=$request->docdate;
            $smm->inv_no=$request->inv;
            $smm->authorize_date=$request->authdate;
            $smm->payment_date=$request->paydate;
            $smm->maturity_date=Date('Y-m-d', strtotime($request->paydate."+60 days"));
            $smm->save();

            return Response::json(['success' => '1']);

        }
        
        return Response::json(['errors' => $validator->errors()]);
    
    }


    public function complete_ship(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'id' => 'required',
      
          
        ],[
            'id.required'=>'This is not ready for Ship, Please Insert Information First',
     

        ]);

       // $input = $request->all();
            
        if ($validator->passes()) {

            // Store your user in database 
            DB::table('shipment_modules')->where('shipment_id',$request->id)->update(['sms_status'=>'complete']);
           

            return Response::json(['success' => '1']);

        }
        
        return Response::json(['errors' => $validator->errors()]);
    
    }
}
