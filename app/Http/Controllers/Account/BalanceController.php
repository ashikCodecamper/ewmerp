<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountModel\Balance;
use App\Model\AccountModel\Expense;
use Illuminate\Support\Facades\DB;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::all();
        return view('account.balance.edit1', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('account.balance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Balance::create([
            'date' => $request->date,
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect(route('balance.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $balance = Balance::find($id);

        return view('account.balance.edit', compact('balance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $party = Balance::find($id);

        $party['amount'] = $request->amount;
        $party['description'] = $request->description;
        $party['date'] = $request->date;
       
        $party->save();

        return redirect(route('balance.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $party = Balance::find($id);
        $party->delete();

        return redirect(route('balance.index'));
    }


    //for rest api
    public function send_json(Request $request)
    {
        $id = $request->id;

        $balance = Balance::find($id);

        return  response()->json($balance);
    }

    public function balanceexpense()
    {

        $balance = DB::table('Balances')->select('date', 'amount as amount_received')->get();

        $expense = DB::table('Expenses')->select('recording_date as date', 'expense_amount as amount_paid')->get();

        //$expense_balance = collect($expense,$balance);
        $all = $balance->merge($expense);
        $all = $all->sortBy('date')->groupBy('date');

        $final = collect();

        foreach ($all as $key => $value) {
            $amount_received = $all[$key]->sum('amount_received');
            $amount_paid = $all[$key]->sum('amount_paid');
            $a = array();

            $a['date'] = $key;
            $a['amount_paid'] = $amount_paid;
            $a['amount_received'] = $amount_received;
            $final->push($a);
        }

        $final = $final->all();
        // return $final;
        $cbalance = 0;
        return view('account.balance.balanceexpense', compact('final', 'cbalance'));
        
    }

    public function balanceexpenseShow()
    {
        return view('account.balance.balancexpense_report');
    }

     public function balanceexpenseReport(Request $request)
    {
        //opening balance data
        $start = $request->start;
        $end = $request->end;

        $balanceO = DB::table('Balances')->select('date', 'amount as amount_received')->where('date', '<', $start)->get();

        $expenseO = DB::table('Expenses')->select('recording_date as date', 'expense_amount as amount_paid')->where('recording_date', '<', $start)->get();

        $allO = $balanceO->merge($expenseO);

        $openning = $allO->sum('amount_received') - $allO->sum('amount_paid');



        //date wise report data
        $balance = DB::table('Balances')->select('date', 'amount as amount_received', 'description')->where('date', '>=', $start)->where('date', '<=', $end)->get();

        $expense = DB::table('Expenses')->select('recording_date as date', 'expense_amount as amount_paid','details_description as description')->where('recording_date', '>=', $start)->where('recording_date', '<=', $end)->get();

        $all = $balance->merge($expense);
        $all = $all->sortBy('date');

        //$final = collect();

        // foreach ($all as $key => $value) {
        //     $amount_received = $all[$key]->sum('amount_received');
        //     $amount_paid = $all[$key]->sum('amount_paid');
        //     $a = array();

        //     $a['date'] = $key;
        //     $a['amount_paid'] = $amount_paid;
        //     $a['amount_received'] = $amount_received;
        //     $final->push($a);
        // }

        $final = $all->all();
        return view('account.balance.balanceexpense2',['openning'=>$openning,'finals'=>$final]);
        
    }
}
