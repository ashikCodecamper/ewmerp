<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountModel\AccountHead;
use App\Model\AccountModel\AccountSubHead;
use Illuminate\Http\Request;

class AccountSubHeadController extends Controller
{
    public function index()
    {
        $aheads = AccountHead::all();

        $heads = AccountSubHead::all();

        return view('account.subaccounthead.index', compact('heads', 'aheads'));
    }

    public function store(Request $request)
    {
        AccountSubHead::create([
            'head_id'     => $request->head,
            'name'        => $request->name,
            'description' => $request->description,
        ]);

        return redirect(route('accountsubhead.index'));
    }

    public function update(Request $request)
    {
        $url = request()->url();
        $id = explode('/', $url)[5];

        $party = AccountSubHead::find($id);

        $party['head_id'] = $request->heads;
        $party['name'] = $request->name;
        $party['description'] = $request->description;

        $party->save();

        return redirect(route('accountsubhead.index'));
    }

    public function destroy($id)
    {
        $url = request()->url();
        $id = explode('/', $url)[5];

        $party = AccountSubHead::find($id);
        $party->delete();

        return redirect(route('accountsubhead.index'));
    }

    public function send_json(Request $request)
    {
        $id = $request->id;

        $balance = AccountSubHead::find($id);

        return $balance;
    }
}
