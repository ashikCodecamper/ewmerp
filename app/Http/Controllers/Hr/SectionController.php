<?php

namespace App\Http\Controllers\Hr;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Hrsection;
class SectionController extends Controller
{
    public function section() {
        $secs = Hrsection::all();
        return view('hr.hrsection',['secs'=>$secs]);
    }

    public function createsection(Request $request) {
        $validator = Validator::make($request->all(), [
            'sec_name' => 'required|unique:hrsections|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('hrsection')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $secs = new Hrsection;
            $secs->sec_name = $request->sec_name;
            $secs->save();
            return redirect()->route('hrsection');
        }
    }
}
