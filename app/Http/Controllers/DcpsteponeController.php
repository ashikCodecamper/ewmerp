<?php

namespace App\Http\Controllers;

use App\DcpBrand;
use App\DcpLabel;
use App\DcpProductCategory;
use App\DcpSeason;
use App\Dcpstepone;
use DB;
use Illuminate\Http\Request;
use Session;

class DcpsteponeController extends Controller
{
    public function index()
    {
        $data = DB::table('dcpstepones')
        ->join('dcp_seasons', 'dcpstepones.season_id', '=', 'dcp_seasons.id')
        ->join('dcp_labels', 'dcpstepones.level_id', '=', 'dcp_labels.id')
        ->join('dcp_brands', 'dcpstepones.brand_id', '=', 'dcp_brands.id')
        ->join('dcp_product_categories', 'dcpstepones.prdct_cat_id', '=', 'dcp_product_categories.id')
        ->select('dcpstepones.*', 'dcp_seasons.sea_name', 'dcp_labels.label_name', 'dcp_brands.brand_name', 'dcp_product_categories.name')
        ->get();

        return view('dcp.stepone.index', compact('data'));
    }

    public function create()
    {
        $dcpstepcode = Dcpstepone::all()->pluck('sl_no')->last();
        if (empty($dcpstepcode) == true) {
            $dcpstepcode = '1';
            $dcpstepcode = str_pad($dcpstepcode, 5, '0', STR_PAD_LEFT);
        } else {
            $num = explode('--', $dcpstepcode);
            $temp = $num[1];
            $no = ltrim($temp, '0');
            $dcpstepcode = ++$no;
            $dcpstepcode = str_pad($dcpstepcode, 5, '0', STR_PAD_LEFT);
        }

        $code = 'EWMSRC--';

        return view('dcp.stepone.dcpstepone', ['labels'=>DcpLabel::all(), 'seasons'=>DcpSeason::all(), 'brands'=>DcpBrand::all(), 'pcats'=>DcpProductCategory::all(), 'code'=>$code, 'dcpstepcode'=>$dcpstepcode]);
    }

    public function store(Request $request)
    {
        $id = $request->prdct;
        $proto = $request->proto;

        $data = DB::table('dcpstepones')->where('proto', '=', $proto)->pluck('proto')->first();
        if ($proto == $data) {
            $request->validate([
             'proto'=> 'unique:dcpstepones',
           ], [
             'proto.unique'=> 'Proto Number Already Registered',
           ]);
        }

        $info = DB::table('dcp_product_categories')
                ->join('dcp_productstypes', 'dcp_product_categories.dcproductype_id', '=', 'dcp_productstypes.id')
                ->where('dcp_product_categories.id', $id)
                ->get();
        $type = $info[0]->type;
        // print_r($type);
        // backend validation rules here.
        if (strcasecmp($type, 'knitwear') == 0) {
            $request->validate([

                'garmntsweight'=> 'required|regex:/^[0-9_-]+$/',
                'knitprice'    => 'required|numeric',
            ], [

                'garmntsweight.required'=> 'Garments Weight is Required',
                'garmntsweight.regex'   => 'Garments Weight is Invalid',
                'knitprice.required'    => 'Knitprice is Required',
                'knitprice.numeric'     => 'Knitprice only Numeric',
            ]);
        } elseif (strcasecmp($type, 'woven') == 0) {
            $request->validate([

                'fabconst' => 'required',
                'cutwidth' => 'required|numeric',
                'fabweight'=> 'required|numeric',
                'fabprice' => 'required|numeric',
            ], [

                'fabconst.required' => 'Fabric Construction Required',
                'cutwidth.required' => 'Cutable Width is Required',
                'cutwidth.numeric'  => 'Cutable width only numeric',
                'fabweight.required'=> 'Fabric Weight is required',
                'fabweight.numeric' => 'Fabric Weight only numeric',
                'fabprice.required' => 'Fabric price is required',
                'fabprice.numeric'  => 'Fabric price only numeric',
            ]);
        } elseif (strcasecmp($type, 'leisurewear') == 0) {
            $request->validate([

                'pricepfx' => 'required',
                'cutwidth' => 'required|numeric',
                'fabweight'=> 'required|numeric',
                'fabprice' => 'required|numeric',
            ], [
                'cutwidth.required' => 'Cutable Width is Required',
                'cutwidth.numeric'  => 'Cutable width only numeric',
                'fabweight.required'=> 'Fabric Weight is required',
                'fabweight.numeric' => 'Fabric Weight only numeric',
                'fabprice.required' => 'Fabric price is required',
                'fabprice.numeric'  => 'Fabric price only numeric',
                'pricepfx.required' => 'Select Price prefix',

            ]);
        }

        $dcpstore = new Dcpstepone();
        $dcpstore->sl_no = $request->sl_no;
        $dcpstore->season_id = $request->seasn;
        $dcpstore->brand_id = $request->brand;
        $dcpstore->level_id = $request->lvl;
        $dcpstore->prdct_cat_id = $request->prdct;

        $dcpstore->feb_construction = $request->fabconst;
        $dcpstore->cutable_width = $request->cutwidth;
        $dcpstore->febrice_weight = $request->fabweight;
        $dcpstore->febrice_price = $request->fabprice;
        $dcpstore->price_prefix = $request->pricepfx;
        $dcpstore->garments_weight = $request->garmntsweight;
        $dcpstore->garments_price = $request->knitprice;

        $dcpstore->proto = $request->proto;
        $dcpstore->proto_rcv_date = $request->prdate;
        $dcpstore->source_type = $request->srctype;
        $dcpstore->clr_name = $request->clrname;
        $dcpstore->style_code = $request->style_code;
        $dcpstore->yarn = $request->yarn;
        $dcpstore->prdct_des = $request->pdes;

        if (!empty($request->file('img'))) {
            $file = $request->file('img');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path().'/uploads/';
            $file->move($destinationPath, $fileName);
            $dcpstore->image = $fileName;
        }

        $dcpstore->save();
        $id = $dcpstore->id;

        return redirect(route('dcpsteponeindex'));
    }

    public function edit($id)
    {
        $dcpstepone = Dcpstepone::find($id);
        // print_r($dcpstepone->proto);
        //  $dcpbrand=DcpBrand::all();
        return view('dcp.stepone.edit', ['labels'=>DcpLabel::all(), 'seasons'=>DcpSeason::all(), 'brands'=>DcpBrand::all(), 'pcats'=>DcpProductCategory::all(), 'dcp'=>$dcpstepone]);
    }

    public function update(Request $request, $id)
    {
        $catid = $request->prdct;
        $proto = $request->proto;

        $data = DB::table('dcpstepones')->where('proto', '=', $proto)->pluck('proto')->first();
        $proto_id = DB::table('dcpstepones')->where('proto', '=', $proto)->pluck('id')->first();
        if ($proto == $data && $id != $proto_id) {
            $request->validate([
          'proto'=> 'unique:dcpstepones',
        ], [
          'proto.unique'=> 'Proto Number Already Registered',
        ]);
        }

        $info = DB::table('dcp_product_categories')
           ->join('dcp_productstypes', 'dcp_product_categories.dcproductype_id', '=', 'dcp_productstypes.id')
           ->where('dcp_product_categories.id', $catid)
           ->get();
        $type = $info[0]->type;
        // print_r($type);
        // backend validation rules here.
        if (strcasecmp($type, 'knitwear') == 0) {
            $request->validate([

             'garmntsweight'=> 'required|regex:/^[0-9_-]+$/',
             'knitprice'    => 'required|numeric',
         ], [

             'garmntsweight.required'=> 'Garments Weight is Required',
             'garmntsweight.regex'   => 'Garments Weight is Invalid',
             'knitprice.required'    => 'Knitprice is Required',
             'knitprice.numeric'     => 'Knitprice only Numeric',
         ]);
        } elseif (strcasecmp($type, 'woven') == 0) {
            $request->validate([

             'fabconst' => 'required',
             'cutwidth' => 'required|numeric',
             'fabweight'=> 'required|numeric',
             'fabprice' => 'required|numeric',
         ], [

             'fabconst.required' => 'Fabric Construction Required',
             'cutwidth.required' => 'Cutable Width is Required',
             'cutwidth.numeric'  => 'Cutable width only numeric',
             'fabweight.required'=> 'Fabric Weight is required',
             'fabweight.numeric' => 'Fabric Weight only numeric',
             'fabprice.required' => 'Fabric price is required',
             'fabprice.numeric'  => 'Fabric price only numeric',
         ]);
        } elseif (strcasecmp($type, 'leisurewear') == 0) {
            $request->validate([

             'pricepfx' => 'required',
             'cutwidth' => 'required|numeric',
             'fabweight'=> 'required|numeric',
             'fabprice' => 'required|numeric',
         ], [
             'cutwidth.required' => 'Cutable Width is Required',
             'cutwidth.numeric'  => 'Cutable width only numeric',
             'fabweight.required'=> 'Fabric Weight is required',
             'fabweight.numeric' => 'Fabric Weight only numeric',
             'fabprice.required' => 'Fabric price is required',
             'fabprice.numeric'  => 'Fabric price only numeric',
             'pricepfx.required' => 'Select Price prefix',

         ]);
        }

        $dcpstore = Dcpstepone::find($id);
        $dcpstore->season_id = $request->seasn;
        $dcpstore->brand_id = $request->brand;
        $dcpstore->level_id = $request->lvl;
        $dcpstore->prdct_cat_id = $request->prdct;

        $dcpstore->feb_construction = $request->fabconst;
        $dcpstore->cutable_width = $request->cutwidth;
        $dcpstore->febrice_weight = $request->fabweight;
        $dcpstore->febrice_price = $request->fabprice;
        $dcpstore->price_prefix = $request->pricepfx;
        $dcpstore->garments_weight = $request->garmntsweight;
        $dcpstore->garments_price = $request->knitprice;

        $dcpstore->proto = $request->proto;
        $dcpstore->proto_rcv_date = $request->prdate;
        $dcpstore->source_type = $request->srctype;
        $dcpstore->clr_name = $request->clrname;
        $dcpstore->style_code = $request->style_code;
        $dcpstore->yarn = $request->yarn;
        $dcpstore->prdct_des = $request->pdes;
        $dcpstore->save();
        Session::flash('success', 'Successfully Updated!');

        return redirect()->route('dcpsteponeindex');
    }

    public function destroy($id)
    {
        Dcpstepone::destroy($id);
        Session::flash('success', 'Successfully Deleted !');

        return redirect()->route('dcpsteponeindex');
    }

    /*
    * Proto Style Number Check.
    **/

    public function checkproto(Request $request)
    {
        $proto = $request->protono;
        $data = DB::table('dcpstepones')->where('proto', '=', $proto)->pluck('proto')->first();
        if ($data == $proto) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
