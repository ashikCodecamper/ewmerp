@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="{{asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}" />
@endsection
@section('module-name','Edit Employee Information')
@section('content')
<div class="row">
<div class="modal-body">
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
      @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
      @endforeach
  </ul>
</div>
@endif
  <form action="{{route('profile.update',$user->id)}}" method="POST" enctype="multipart/form-data">
  {{csrf_field()}}
  <input type="hidden" name="_method" value="PUT">
    <div class="form-group ">
      <div class="row">
          <div class="col-md-4">
          <label for="" class="col-form-label">Full Name</label>
          <input type="text" name="f_name" value="{{ $user->name }}" class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Email Address</label>
              <input type="email" name="email" value="{{ $user->email }}" class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Password</label>
              <input type="password" name="password" value="123456" class="form-control" >
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
          <label for="" class="col-form-label">Date Of Birth</label>
          <input type="text" name="dob" value="{{ $user->profile->dob }}" class="form-control datepicker" >
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label">Select Employement Type</label>
              <select name="emptype" id="" class="form-control">
                 @if(!empty($empts))
                  @foreach($empts as $empt)
                  <option value="{{$empt->emp_name}}">{{$empt->emp_name}}</option>
                  @endforeach
               @endif
              </select>
              </div>
            </div>
            <div class="col-md-4">
              <label for="" class="col-form-label">Joining Date</label>
              <input type="text" name="join_date" value="{{ $user->profile->join_date }}" class="form-control datepicker" >
          </div>

          
      </div>
      <div class="row">
        <div class="col-md-3">
          <input type="file" name="avatar" id="profile-img">
        <img src="/uploads/{{$user->profile->avatar}}" id="profile-img-tag" width="200px" /></div>
        
        <div class="col-md-6">
          
        </div>
      </div>
        
      <div class="row">
          <div class="col-md-6">
              <label for="">NID</label>
              <input type="text" name="nid" value="{{$user->profile->nid}}" class="form-control">
          </div>
          <div class="col-md-6">
              <label for=""> Section </label>
              <select name="section" id="" class="form-control">
                  @if(!empty($secs))
                      @foreach($secs as $sec)
                      <option value="{{$sec->sec_name}}">{{$sec->sec_name}}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
              <label for="">Department</label>
              <select name="department" id="" class="form-control">
              @if(!empty($deps))
                  @foreach($deps as $dep)
                  <option value="{{$dep->dep_name}}">{{$dep->dep_name}}</option>
                  @endforeach
               @endif
               </select>
          </div>
          <div class="col-md-6">
              <label for="">Designation</label>
              <select name="designation" id="" class="form-control">
              @if(!empty($degis))
                  @foreach($degis as $deg)
                  <option value="{{$deg->deg_name}}">{{$deg->deg_name}}</option>
                  @endforeach
              @endif
              </select>
          </div>
      </div>
          <div class="row">
              <div class="col-md-6">
                  <label for="">Mobile Number</label>
                  <input type="text" name="mobile_number" value="{{ $user->profile->mobile_number}}" class="form-control">
              </div>
              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-8">
                      <label for="">Passport Number</label>
                      <input type="text" name="passport_number" value="{{$user->profile->passport_number }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="">Expire Date</label>
                      <input type="text" name="exp_date" value="{{$user->profile->exp_date }}" class="form-control datepicker">
                    </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label for="">Emergency Contact Number</label>
                <input type="text" name="emg_contact_number" value="{{$user->profile->emg_contact_number }}" class="form-control">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">Blood Group</label>
                <select name="blood_group" class="form-control">
                  <option value="a+">A+</option>
                  <option value="b+">B+</option>
                  <option value="a-">A-</option>
                  <option value="AB+">AB+</option>
                  <option value="o+">O+</option>
                  <option value="o-">O-</option>
                </select>
                </div>
                
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="">Present Address</label>
              <textarea name="present_addr" id="" cols="30" rows="3" class="form-control">{{$user->profile->present_addr}}</textarea>
            </div>
            <div class="col-md-6">
              <label for="">Permanent Address</label>
              <textarea name="permanent_addr" id="" cols="30" rows="3" class="form-control">{{$user->profile->permanent_addr}}</textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="">Educational background</label>
              <textarea name="edu_back" id="" cols="30" rows="3" class="form-control">{{$user->profile->edu_back}}</textarea>
            </div>
            <div class="col-md-6">
              <label for="">Previous office Information</label>
              <textarea name="pre_office_info" id="" cols="30" rows="3" class="form-control">{{$user->profile->pre_office_info}}</textarea>
            </div>
          </div>


    </div>
    <button type="submit" class="btn btn-primary">Save </button>
  </form>
</div>
</div>
@endsection
@section('javascript')
    <script src="{{asset("assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
    <script>

        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            changeMonth: true,
            changeYear: true,
            autoSize: true
        });
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
    </script>
@endsection

