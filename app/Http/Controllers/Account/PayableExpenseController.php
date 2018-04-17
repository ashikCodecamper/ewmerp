<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountModel\PayableExpense;
use App\Model\AccountModel\AccountHead;
use App\Model\AccountModel\Party;
class PayableExpenseController extends Controller
{
    public function index()
    {
        $expenses = PayableExpense::all();
        return view('account.payabale_expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    	$heads = AccountHead::all();
    	$parties = Party::all();
        return view('account.payabale_expense.create', compact('heads', 'parties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        PayableExpense::create([
        	'recording_date' => $request->recording_date,
        	'invoice_date' => $request->invoice_date,
        	'voucher_no' => $request->voucher_no,
        	'particulars' => $request->particulars,
        	'head_id' => $request->head,
        	'party_id' => $request->party,
        	'details_description' => $request->details_description,
        	'expense_amount' => $request->amount,
            'subhead_id' => $request->subhead
        ]);

        return redirect(route('payable.index'));

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

        $expense =  PayableExpense::find($id);
        $heads = AccountHead::all();
    	$parties = Party::all();

        return view('account.payabale_expense.edit', compact('expense', 'heads', 'parties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $url = request()->url();
        $id = explode("/", $url)[5];

        $expense = PayableExpense::find($id);
		$expense->recording_date = $request->recording_date;
        $expense->invoice_date = $request->invoice_date;
        $expense->voucher_no = $request->voucher_no;
        $expense->particulars = $request->particulars;
        $expense->head_id = $request->head;
        $expense->party_id = $request->party;
        $expense->details_description = $request->details_description;
        $expense->expense_amount = $request->amount;

        $expense->save();

        return redirect(route('payable.index'));
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

        $party = PayableExpense::find($id);
        $party->delete();

        return redirect(route('payable.index'));
    }
}
