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
  <form action="#" method="POST">
  {{csrf_field()}}
    <div class="form-group ">
      <div class="row">
          <div class="col-md-4">
          <label for="" class="col-form-label">Full Name</label>
          <input type="text" name="f_name" value="{{ old('f_name') }}" class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Email Address</label>
              <input type="email" name="email" value="{{ old('email') }}" class="form-control" >
          </div>
          <div class="col-md-4">
              <label for="" class="col-form-label">Password</label>
              <input type="password" name="password" value="" class="form-control" >
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
          <label for="" class="col-form-label">Date Of Birth</label>
          <input type="text" name="dob" value="{{ old('dob') }}" class="form-control datepicker" >
          </div>
          <div class="col-md-6">
              <label for="" class="col-form-label">Joining Date</label>
              <input type="text" name="joindate" value="{{ old('joindate') }}" class="form-control datepicker" >
          </div>
      </div><br>
            <div class="row">
            <div class="col-sm-4 text-center">
                <div class="kv-avatar">
                    <div class="file-loading text-left">
                        <figure id="avatar-uploader">
                          <img src="/uploads/avatar.jpg" alt="">
                          <figcaption>
                            Upload Your Avatar
                          </figcaption>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
      <div class="row">
          <div class="col-md-6">
              <label for="">NID</label>
              <input type="text" name="nid" value="{{ old('nid') }}" class="form-control">
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
              <select name="dep" id="" class="form-control">
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
                  <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
              </div>
              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-8">
                      <label for="">Passport Number</label>
                      <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    </div>
                    <div class="col-md-4">
                      <label for="">Expire Date</label>
                      <input type="text" name="phone" value="{{ old('phone') }}" class="form-control datepicker">
                    </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                <label for="">Emergency Contact Number</label>
                <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="">Present Address</label>
              <textarea name="addr" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
              <label for="">Permanent Address</label>
              <textarea name="addr" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label for="">Educational background</label>
              <textarea name="addr" id="" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
              <label for="">Previous office Information</label>
              <textarea name="addr" id="" cols="30" rows="3" class="form-control"></textarea>
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

        jQuery(document).ready(function($){
          $("#avatar-uploader").click(function() {
            $.FileDialog().on('files.bs.filedialog', function(ev) {
              var files_list = ev.files;
              // DO SOMETHING
              $("#avatar-uploader > img").attr("src", files_list[0].content);
              $("#avatar-uploader figcaption").hide();
            });
          });
        });
    </script>
@endsection

