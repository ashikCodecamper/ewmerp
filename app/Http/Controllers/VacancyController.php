<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HrJobOpenning;
use App\Jobapplicant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class VacancyController extends Controller
{
    public function index() {
        $joblist = HrJobopenning::all();
        return view('vacancy.index',['joblists'=>$joblist]);
    }

    public function show($id) {
        $joblist = HrJobopenning::find($id);
        return view('vacancy.show',['joblist'=>$joblist]);
    }

    public function apply(Request $request) {
        
        return view('vacancy.apply',['id'=>$request->id]);
    }

    public function saveapply(Request $request) {
        $file = $request->cv;
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put('public/'.$file->getFilename().'.'.$extension,  File::get($file));


        $this->validate($request, [
            'full_name'=>'required',
            'email'=>'required|email',
            'mobile'=>'required',
            'cv' => 'required|mimes:doc,docx,pdf|max:5120',
    
        ]);
        $applicant = new Jobapplicant;
        $applicant->job_id = $request->id;
        $applicant->full_name = $request->full_name;
        $applicant->email = $request->email;
        $applicant->mobile = $request->mobile;
        $applicant->cv = $file->getFilename().'.'.$extension;
        $applicant->save();
        
       return redirect()->route('vacancylist');


    }
}
