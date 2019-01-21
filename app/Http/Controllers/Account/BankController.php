<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountModel\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::all();

        return view('account.bank.index', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.bank.create');
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
        Bank::create([
            'bank_name'   => $request->bank_name,
            'branch_name' => $request->branch_name,
            'account_no'  => $request->account_no,
            'address'     => $request->address,
        ]);

        return redirect(route('bank.index'));
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
        $url = request()->url();
        $id = explode('/', $url)[5];

        $bank = Bank::find($id);

        return view('account.bank.edit', compact('bank'));
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
        $url = request()->url();
        $id = explode('/', $url)[5];

        $party = Bank::find($id);

        $party['bank_name'] = $request->bank_name;
        $party['branch_name'] = $request->branch_name;
        $party['account_no'] = $request->account_no;
        $party['address'] = $request->address;

        $party->save();

        return redirect(route('bank.index'));
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
        $url = request()->url();
        $id = explode('/', $url)[5];

        $party = Bank::find($id);
        $party->delete();

        return redirect(route('bank.index'));
    }
}
