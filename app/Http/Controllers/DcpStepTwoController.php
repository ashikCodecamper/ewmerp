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
use Excel;

class DcpStepTwoController extends Controller
{
    public function index()
    {
        $srcno=Dcpstepone::all();
        $cour_no=DcpCourier::all();
        $supplier=DcpSupplier::all();
    	return view('dcp.steptwo.dcpsteptwo',compact('srcno','cour_no','supplier'));
    }

    public function store(Request $request)
    {
    	
    	$dcptwo=new DcpStepTwo;
    	$dcptwo->source_id=$request->srcno;
      $dcptwo->supplier_id=$request->suppliername;
    	$dcptwo->target_price=$request->targetprice;
    	$dcptwo->sup_name=$request->supplier;
    	$dcptwo->fob_price=$request->fobprice;
    	$dcptwo->courier_no=$request->courier;
    	$dcptwo->submission_date=$request->sub_date;
    	$dcptwo->prcl_track_no=$request->trackno;
    	$dcptwo->uk_arrival=$request->arrivedate;
    	$dcptwo->save();	
    
    	return redirect()->route('dcpsteptwolist');
        // return $request->all();

    }

    public function list()
    {

    	//$steptwolist=DcpStepTwo::where('status','=','0')->get();

        $steptwolist = DB::table('dcp_step_twos')
                ->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')
                ->join('dcp_couriers','dcp_step_twos.courier_no','=','dcp_couriers.id')
                ->join('dcp_suppliers','dcp_step_twos.supplier_id','=','dcp_suppliers.id')
                ->select('dcpstepones.sl_no','dcpstepones.proto','dcp_step_twos.fob_price','dcp_step_twos.target_price','dcp_step_twos.sup_name','dcp_couriers.courier_name','dcp_step_twos.submission_date','dcp_step_twos.prcl_track_no','dcp_step_twos.uk_arrival','dcp_step_twos.id','dcp_step_twos.sup_name','dcp_suppliers.supplier_name')
                ->where('dcp_step_twos.status',0)
                ->get();

    	return view('dcp.steptwo.index',compact('steptwolist'));

    }

     public function edit($id)
     {
          $srcno=Dcpstepone::all();
          $cour_no=DcpCourier::all();
          $supplier=DcpSupplier::all();
          $dcptwo=DcpStepTwo::find($id);
         return view('dcp.steptwo.edit',compact('srcno','cour_no','dcptwo','supplier'));
     }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'srcno'=>'required',
            'tarprice'=>'required|numeric',
            'fobprice'=>'required|numeric',
            'supplier'=>'required',
            'courier'=>'required',
            'sub_date'=>'required',
            'trackno'=>'required',
    
        ],[
            'srcno.required'=>'Source code required',
            'supplier.required'=>'Enter Supplier',
            'tarprice.required'=>'Insert target price',
            'tarprice.numeric'=>'only contains numeric',
            'fobprice.required'=>'insert fob price',
            'fobprice.numeric'=>'only contains number',
            'courier.required'=>'Select courier'

        ]);

    	
    	$dcptwo=DcpStepTwo::find($id);
        $dcptwo->source_id=$request->srcno;
        $dcptwo->supplier_id=$request->suppliername;
        $dcptwo->sup_name=$request->supplier;
        $dcptwo->target_price=$request->tarprice;
        $dcptwo->fob_price=$request->fobprice;
        $dcptwo->courier_no=$request->courier;
        $dcptwo->submission_date=$request->sub_date;
        $dcptwo->prcl_track_no=$request->trackno;
        $dcptwo->uk_arrival=$request->arrivedate;
        $dcptwo->save();    
    
    	

         Session::flash('success', 'Successfully Updated!');
         return redirect()->route('dcpsteptwolist');
    }

    public function destroy($id)
    {
         DcpStepTwo::destroy($id);
        Session::flash('success','Successfully Deleted !');
         return redirect()->route('dcpsteptwolist');
        
    }

    public function getinfo(Request $request)
    {
        $id=$request->id;
        $info=DB::table('dcp_product_categories')
            ->join('dcp_productstypes','dcp_product_categories.dcproductype_id','=','dcp_productstypes.id')
            ->where('dcp_product_categories.id',$id)
            ->get();
        return $info;
    }


    public function approve($id)
    {
       $approve=DcpStepTwo::find($id);
       $approve->status=1;
       $approve->save();
       Session::flash('success','Successfully Approved !');
       return redirect()->route('dcpsteptwolist');
    }

    public function approved()
    {
        $steptwolist=DB::table('dcp_step_twos')
                ->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')
                ->join('dcp_brands','dcpstepones.brand_id','=','dcp_brands.id')
                ->select('dcpstepones.sl_no','dcpstepones.proto','dcpstepones.proto_rcv_date','dcpstepones.prdct_des','dcpstepones.yarn','dcp_brands.brand_name','dcp_step_twos.fob_price','dcp_step_twos.target_price','dcp_step_twos.sup_name')
                ->where('dcp_step_twos.status',1)
                ->get();
        return view('dcp.reports.dcp_approved_list',compact('steptwolist'));
    }

    public function export()
    {

        $data = DB::table('dcp_step_twos')
                ->join('dcpstepones','dcp_step_twos.source_id','=','dcpstepones.id')
                ->join('dcp_brands','dcpstepones.brand_id','=','dcp_brands.id')
                ->join('dcp_seasons','dcpstepones.season_id','=','dcp_seasons.id')
                ->join('dcp_product_categories','dcpstepones.prdct_cat_id','=','dcp_product_categories.id')
                ->join('dcp_couriers','dcp_step_twos.courier_no','=','dcp_couriers.id')
                ->select('dcpstepones.sl_no','dcpstepones.proto','dcpstepones.proto_rcv_date','dcpstepones.prdct_des','dcpstepones.yarn','dcp_brands.brand_name','dcp_step_twos.fob_price','dcp_step_twos.target_price','dcp_step_twos.sup_name','dcp_seasons.sea_name','dcp_product_categories.name','dcp_couriers.courier_name','dcp_step_twos.submission_date','dcp_step_twos.prcl_track_no','dcp_step_twos.uk_arrival')
                ->where('dcp_step_twos.status',1)
                ->get();

 
        $items=array();
        foreach ($data as $key=>$d) {
            $items[$key]['#']=++$key;
            $items[$key]['Source NO']=$d->sl_no;
            $items[$key]['Season']=$d->sea_name;
            $items[$key]['Brand']=$d->brand_name;
            $items[$key]['Categories']=$d->name;
            $items[$key]['Supplier']=$d->sup_name;
            $items[$key]['Proto no.']=$d->proto;
            $items[$key]['Proto Received Date']=$d->proto_rcv_date;
            $items[$key]['Yarn/Febric Composition']=$d->yarn;
            $items[$key]['Product Description']=$d->prdct_des;
            $items[$key]['FOB Price']=$d->fob_price;
            $items[$key]['Target Price']=$d->target_price;
             $items[$key]['Courier']=$d->courier_name;
              $items[$key]['Send Date']=$d->submission_date;
               $items[$key]['Percel no.']=$d->prcl_track_no;
                $items[$key]['UK Arrive']=$d->uk_arrival;
            
        }

       
      Excel::create('DCP Approved List', function($excel) use($items) {
        
         $excel->sheet('Paid List', function($sheet) use($items){
             $sheet->fromArray($items);
        });

      })->export('csv');
    }

}
