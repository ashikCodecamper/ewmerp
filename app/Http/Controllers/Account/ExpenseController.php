<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountModel\Expense;
use App\Model\AccountModel\AccountHead;
use App\Model\AccountModel\Party;
use App\Model\AccountModel\PayableExpense;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    
    public function index()
    {
        $expenses = Expense::all();
        return view('account.expense.index', compact('expenses'));
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
        return view('account.expense.create', compact('heads', 'parties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Expense::create([
        	'recording_date' => $request->recording_date,
        	'invoice_date' => $request->invoice_date,
        	'voucher_no' => $request->voucher_no,
        	'particulars' => $request->particulars,
        	'head_id' => $request->head,
        	'party_id' => $request->party,
        	'details_description' => $request->details_description,
        	'mode_of_payment' => $request->payment_type,
        	'cheque_no' => $request->cheque_no,
        	'expense_amount' => $request->amount,
            'subhead_id' => $request->subhead
        ]);

        return redirect(route('expense.index'));

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

        $expense =  Expense::find($id);
        $heads = AccountHead::all();
    	$parties = Party::all();

        return view('account.expense.edit', compact('expense', 'heads', 'parties'));
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

        $expense = Expense::find($id);
		$expense->recording_date = $request->recording_date;
        $expense->invoice_date = $request->invoice_date;
        $expense->voucher_no = $request->voucher_no;
        $expense->particulars = $request->particulars;
        $expense->head_id = $request->head;
        $expense->party_id = $request->party;
        $expense->details_description = $request->details_description;
        $expense->mode_of_payment = $request->payment_type;
        $expense->cheque_no = $request->cheque_no;
        $expense->expense_amount = $request->amount;

        $expense->save();

        return redirect(route('expense.index'));
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

        $party = Expense::find($id);
        $party->delete();

        return redirect(route('expense.index'));
    }

     public function pay(Request $request, $id)
    {
        $payable = PayableExpense::find($id);

        $expense = new Expense;

        $expense->recording_date = $payable->recording_date;
        $expense->invoice_date = $payable->invoice_date;
        $expense->voucher_no = $payable->voucher_no;
        $expense->head_id = $payable->head_id;
        $expense->subhead_id = $payable->subhead_id;
        $expense->party_id = $payable->party_id;
        $expense->particulars = $payable->particulars;
        $expense->details_description = $payable->details_description;
        $expense->expense_amount = $payable->expense_amount;

        $expense->mode_of_payment = $request->payment_type;
        $expense->cheque_no = $request->cheque_no;
        $expense->save();
        
        $payable->delete();

        return redirect(route('payable.index'));
    }

    public function expense_month()
    {
        $month = date("m"); 
        return Expense::where(DB::raw('month(recording_date)'), $month )->count() + 1;
        
    }
}
