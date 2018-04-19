<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use Storage;
use App\Role;
use App\User;
use App\Profile;
use App\Hrsection;
use App\HrDepartment;
use App\HrDesignation;
use App\EmploymentType;
use Illuminate\Http\Request;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::has('profile')->paginate(10);
       return view('profile.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create',['secs'=>Hrsection::all(),'deps'=>HrDepartment::all(),'degis'=>HrDesignation::all(),'empts'=>EmploymentType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if(isset($request->avatar)) {
        $image = $request->file('avatar');
        $filename = 'avatar'.time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/'.$filename);
        Image::make($image)->resize(200,200)->save($location);
        $avatar = $filename;
    }
    $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);

        if ($validator->fails()) {
            return redirect(route('profile.create'))
                        ->withErrors($validator)
                        ->withInput();
        }
        $user = new User;
            $user->name= $request->f_name;
             $user->email=$request->email;
             $user->password=bcrypt($request->password);
             $user->save();
        $user->attachRole(5);
       $profile = new  Profile;
            $profile->user_id = $user->id;
            $profile->avatar = $avatar;
            $profile->dob =  $request->dob;
            $profile->join_date = $request->join_date;
            $profile->emptype = $request->emptype;
            $profile->nid = $request->nid;
            $profile->section = $request->section;
            $profile->department = $request->department;
            $profile->designation = $request->designation;
            $profile->mobile_number = $request->mobile_number;
            $profile->blood_group = $request->blood_group;
            $profile->passport_number = $request->passport_number;
            $profile->exp_date = $request->exp_date;
            $profile->emg_contact_number = $request->emg_contact_number;
            $profile->present_addr = $request->present_addr;
            $profile->permanent_addr = $request->permanent_addr;
            $profile->edu_back = $request->edu_back;
            $profile->pre_office_info = $request->pre_office_info;
            $profile->save();
            Session::flash('success', 'Profile Successfully Updated!');
            return redirect()->route('profile.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('profile.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit',['user'=>$user,'secs'=>Hrsection::all(),'deps'=>HrDepartment::all(),'degis'=>HrDesignation::all(),'empts'=>EmploymentType::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(isset($request->avatar)) {
        $image = $request->file('avatar');
        $filename = 'avatar'.time().'.'.$image->getClientOriginalExtension();
        $location = public_path('uploads/'.$filename);
        Image::make($image)->resize(200,200)->save($location);
        $avatar = $filename;
    }else {
        $avatar = $user->profile->avatar;
    }
    $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        if ($validator->fails()) {
            return redirect(route('profile.edit'))
                        ->withErrors($validator)
                        ->withInput();
        }

            $user->name= $request->f_name;
             $user->email=$request->email;
             $user->password=bcrypt($request->password);
             $user->save();

            $user->profile->avatar =$avatar;
            $user->profile->dob =  $request->dob;
            $user->profile->join_date = $request->join_date;
            $user->profile->nid = $request->nid;
            $user->profile->blood_group = $request->blood_group;
            $user->profile->emptype = $request->emptype;
            $user->profile->section = $request->section;
            $user->profile->department = $request->department;
            $user->profile->designation = $request->designation;
            $user->profile->mobile_number = $request->mobile_number;
            $user->profile->blood_group = $request->blood_group;
            $user->profile->passport_number = $request->passport_number;
            $user->profile->exp_date = $request->exp_date;
            $user->profile->emg_contact_number = $request->emg_contact_number;
            $user->profile->present_addr = $request->present_addr;
            $user->profile->permanent_addr = $request->permanent_addr;
            $user->profile->edu_back = $request->edu_back;
            $user->profile->pre_office_info = $request->pre_office_info;
            $user->profile->save();

            Session::flash('success', 'Successfully Updated!');
            return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchprofile() {
    	$q = Input::get ( 'q' );
    	if($q != ""){
    	$user = User::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'email', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    	$pagination = $user->appends ( array (
    				'q' => Input::get ( 'q' )
    		) );
    	if (count ( $user ) > 0)
    		return view ( 'profile.index',['details'=>$user,'query'=>$q] );
    	}
    		return view ( 'profile.index',['message'=>'No Details found. Try to search again !']);
    }
}
