@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="{{asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}" />
@endsection
@section('module-name','Create Employee')
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
  <form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data" data-parsley-validate>
  {{csrf_field()}}
    <div class="form-group ">
      <div class="row">
          <div class="col-md-4">
          <label for="" class="col-form-label">Full Name</label>
          <input type="text" name="f_name" value="{{ old('f_name') }}" required class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Email Address</label>
              <input type="email" name="email" required value="{{ old('email') }}" class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Password</label>
              <input type="password" required name="password" value="" class="form-control" >
          </div>
      </div>
      <div class="row">
          <div class="col-md-4">
          <label for="" class="col-form-label">Date Of Birth</label>
          <input type="text" name="dob" required value="{{ old('dob') }}" class="form-control datepicker" >
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label class="col-form-label">Select Employement Type</label>
              <select name="emptype" id="" required class="form-control">
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
              <input type="text" name="join_date" required value="{{ old('join_date') }}" class="form-control datepicker" >
          </div>

          
      </div>
        <input type="file" name="avatar" id="profile-img">
        <img src="" id="profile-img-tag" width="200px" />
      <div class="row">
          <div class="col-md-6">
              <label for="">NID</label>
              <input type="text" name="nid" required value="{{ old('nid') }}" class="form-control">
          </div>
          <div class="col-md-6">
              <label for=""> Section </label>
              <select name="section" id="" required class="form-control">
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
              <select name="department" id="" required class="form-control">
              @if(!empty($deps))
                  @foreach($deps as $dep)
                  <option value="{{$dep->dep_name}}">{{$dep->dep_name}}</option>
                  @endforeach
               @endif
               </select>
          </div>
          <div class="col-md-6">
              <label for="">Designation</label>
              <select name="designation" id="" required class="form-control">
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
                  <input type="text" name="mobile_number" required value="{{ old('mobile_number') }}" class="form-control">
              </div>
              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-8">
                      <label for="">Passport Number</label>
                      <input type="text" name="passport_number"  value="{{ old('passport_number') }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="">Expire Date</label>
                      <input type="text" name="exp_date" value="{{ old('exp_date') }}" class="form-control datepicker">
                    </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label for="">Emergency Contact Number</label>
                <input type="text" name="emg_contact_number" required value="{{ old('emg_contact_number') }}" class="form-control">
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <div class="form-group">
                  <label for="">Blood Group</label>
                <select name="blood_group" required  class="form-control">
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
              <textarea name="present_addr" id="" required cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
              <label for="">Permanent Address</label>
              <textarea name="permanent_addr" id="" required cols="30" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="">Educational background</label>
              <textarea name="edu_back" id="" required cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
              <label for="">Previous office Information</label>
              <textarea name="pre_office_info" id="" required cols="30" rows="3" class="form-control"></textarea>
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
            autoSize: false
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

