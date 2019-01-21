<?php

namespace App\Http\Controllers\Hr;

use App\EmploymentType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class EmploymentTypeController extends Controller
{
    public function emptype()
    {
        $empt = EmploymentType::all();

        return view('hr.employeementtype', ['empt'=>$empt]);
    }

    public function createemptype(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'emp_name' => 'required|unique:employmenttypes|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->route('emptype')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            $degn = new EmploymentType();
            $degn->emp_name = $request->emp_name;
            $degn->save();

            return redirect()->route('emptype');
        }
    }
}
