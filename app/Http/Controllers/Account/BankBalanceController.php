<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountModel\BankBalance;
use Illuminate\Http\Request;

class BankBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankbalance = BankBalance::all();
        $cbalance = 0;

        return view('account.bankbalance.index', compact('bankbalance', 'cbalance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.bankbalance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BankBalance::create([
            'date'            => $request->date,
            'description'     => $request->description,
            'ref_no'          => $request->ref_no,
            'money_received'  => $request->money_received,
            'money_withdrawn' => $request->money_withdrawn,
        ]);

        return redirect(route('bankbalance.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bankbalance = BankBalance::find($id);

        return view('account.BankBalance.edit', compact('bankbalance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bankbalance = BankBalance::find($id);

        $bankbalance['date'] = $request->date;
        $bankbalance['description'] = $request->description;
        $bankbalance['ref_no'] = $request->ref_no;
        $bankbalance['money_received'] = $request->money_received;
        $bankbalance['money_withdrawn'] = $request->money_withdrawn;
        $bankbalance->save();

        return redirect(route('bankbalance.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bankbalance = BankBalance::find($id);
        $bankbalance->delete();

        return redirect(route('bankbalance.index'));
    }
}
