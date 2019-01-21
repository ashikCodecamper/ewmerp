<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Model\AccountModel\Party;
use Illuminate\Http\Request;

class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parties = Party::all();

        return view('account.party.index', compact('parties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.party.create');
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
        Party::create([
            'party_name'   => $request->party_name,
            'contact_name' => $request->contact_name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'address'      => $request->address,
        ]);

        return redirect(route('party.index'));
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

        $party = Party::find($id);

        return view('account.party.edit', compact('party'));
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

        $party = Party::find($id);

        $party['party_name'] = $request->party_name;
        $party['contact_name'] = $request->contact_name;
        $party['email'] = $request->email;
        $party['phone'] = $request->phone;
        $party['address'] = $request->address;

        $party->save();

        return redirect(route('party.index'));
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

        $party = Party::find($id);
        $party->delete();

        return redirect(route('party.index'));
    }
}
