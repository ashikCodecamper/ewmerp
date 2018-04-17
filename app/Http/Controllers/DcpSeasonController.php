<?php

namespace App\Http\Controllers;


use Session;
use App\DcpSeason;
use Illuminate\Http\Request;

class DcpSeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('dcp.season.index',['seas'=>DcpSeason::orderBy('sea_name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dcp.season.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DcpSeason::create([
          'sea_name' => $request->sea_name
        ]);
        Session::flash('success', 'Successfully Created!');
        return redirect()->route('season.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DcpSeason  $dcpSeason
     * @return \Illuminate\Http\Response
     */
    public function show(DcpSeason $dcpSeason)
    {
        //add
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DcpSeason  $dcpSeason
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $season = DcpSeason::find($id);
        return view('dcp.season.edit',['season'=>$season]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DcpSeason  $dcpSeason
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $season = DcpSeason::find($id);
            $season->sea_name = $request->sea_name;
            $season->save();
            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('season.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DcpSeason  $dcpSeason
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DcpSeason::destroy($id);
       Session::flash('success', 'Successfully Deleted!');
      return redirect()->route('season.index');
    }
}
