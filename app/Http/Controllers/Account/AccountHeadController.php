<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\AccountModel\AccountHead;
class AccountHeadController extends Controller
{
    public function index()
    {
    	$heads = AccountHead::all();
    	return view('account.accounthead.index', compact('heads'));
    }

    public function store(Request $request)
    {
        AccountHead::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect(route('accounthead.index'));

    }

    public function update(Request $request)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $party = AccountHead::find($id);

        $party['name'] = $request->name;
        $party['description'] = $request->description;
       
        $party->save();

        return redirect(route('accounthead.index'));
    }

	public function destroy($id)
    {
        $url = request()->url();
        $id = explode("/", $url)[5];

        $party = AccountHead::find($id);
        $party->delete();

        return redirect(route('accounthead.index'));
    }


    public function send_json(Request $request)
    {
        $id = $request->id;

        $balance = AccountHead::find($id);

        return $balance;
    }

    public function head_subhead(Request $request)
    {
        $id = $request->id;
        return AccountHead::find($id)->subheads;
    }


}
