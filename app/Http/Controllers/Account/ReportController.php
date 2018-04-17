<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\AccountModel\Expense;
use App\Model\AccountModel\AccountHead;
use App\Model\AccountModel\PayableExpense;
use App\Model\AccountModel\Balance;
use Excel;


class ReportController extends Controller
{

    public function show_date_report()
    {
    	return view('account.reports.date_reports');
    }


    public function show_date_report_show(Request $request)
    {
    	$start = $request->start;
    	$end = $request->end;

    	$r = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get();//->toArray();

  //       $te = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get()->sum('expense_amount');
      

  //   	Excel::create('Filename', function($excel) use ($r, $te) {
		//     $sheet = $excel->sheet('Sheetname', function($sheet) use ($r, $te) {
		//         $sheet->loadView('account.reports.date_reports_show', array('s'=> $r, 'total' => $te));
  //               $sheet->cells('A1:F1', function($cells){
  //                   $cells->setFontColor('#ab7f7f');
  //               });
  //   		});

		// })->export('csv');

    	return view('account.reports.date_reports_show', compact('r'));
    }



    public function show_head_report()
    {
    	$heads = AccountHead::all();
    	return view('account.reports.head_reports', compact('heads'));

    	
    }

     public function show_head_report_show(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $head = $request->head;

        if ($head == 'all') {
            $heada = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get();
            $data = $heada->groupBy('head_id');

            //allsum = $heada->sum('expense_amount');
        }
        else {
            $data = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->where('head_id', $head)->get();;
        }

        Excel::create('Filename', function($excel) use ($data, $allsum) {
            $sheet = $excel->sheet('Sheetname', function($sheet) use ($data, $allsum) {
                $sheet->loadView('account.reports.head_reports_show', array('data' => $data, 'allsum'=>$allsum));
                $sheet->cells('A1:F1', function($cells){
                    $cells->setFontColor('#ab7f7f');
                });
            });

        })->export('csv');
    }



    public function show_head_report2()
    {
        $heads = AccountHead::all();
        return view('account.reports.head_reports2', compact('heads'));
    }

    
     public function show_head_report_show2(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $head = $request->head;

        if ($head == 'all') {
            $heada = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get();
            $data = $heada->groupBy('head_id');
            return view('account.reports.head_reports_show2 ', compact('data'));
           
        }
        else {
            $data = Expense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->where('head_id', $head)->get();;

            return view('account.reports.head_reports_show3 ', compact('data'));
        }
    
    }


    public function show_date_report2()
    {
        return view('account.reports.date_reports2');
    }

    public function show_date_report_show2(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $s = PayableExpense::where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get();

        Excel::create('Filename', function($excel) use ($s) {
            $excel->sheet('Sheetname', function($sheet) use ($s) {
                $sheet->setOrientation('landscape');
                $sheet->loadView('account.reports.date_reports_show2', compact('s'));
            });

        })->export('csv');
    }

    public function show_balance_report()
    {
        return view('account.reports.balance_report');
    }

    public function show_balance_report_show(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $r = Balance::where('date', '>=', $start)->where('date', '<=', $end)->get();
        
        /*
        $te = Balance::where('date', '>=', $start)->where('date', '<=', $end)->get()->sum('amount');

        Excel::create('petty cash', function($excel) use ($r, $te) {
            $sheet = $excel->sheet('Sheetname', function($sheet) use ($r, $te) {

                $sheet->loadView('account.reports.balance_reports_show', array('s'=> $r, 'total' => $te));
                $sheet->cells('A1:F1', function($cells){
                    $cells->setFontColor('#ab7f7f');
                });
                $sheet->setStyle(array(
                    'font' => array(
                    'name'      =>  'Calibri',
                    'size'      =>  12,
                    'bold'      =>  true)
                ));
            });

        })->export('csv');*/

        return view('account.reports.balance_reports_show', compact('r'));
    }
}