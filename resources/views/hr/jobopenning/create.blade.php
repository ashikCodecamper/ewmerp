@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="{{asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}" />
<link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">

@endsection
@section('module-name','Job settings')
@section('content')
<div class="row">
          <div class="box">
            <div class="box-header  box-border">
              <h3 class="box-title">Open a new Job</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('jobopenning.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Job List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <form class="" action="{{route('jobopenning.store')}}" method="post" class="form">
                      {{csrf_field()}}
                      
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="col-form-label">Job Title</label>
                              <input type="text" name="job_title" value="{{old('emp_name')}}" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="col-form-label">Deadline</label>
                              <input type="text" name="job_deadline" value="" class="form-control datepicker">
                            </div>
                          </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="col-form-label">No of Vacancy</label>
                              <input type="text" name="job_vacancy" value="{{old('emp_name')}}" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="col-form-label" for="">Job Nature</label>
                              <select name="job_nature" class="form-control">
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                          <div class="form-group">
                              <label class="col-form-label">Educational Requirements</label>
                              <input type="text" name="edu_req" value="" class="form-control">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Experience Requirements</label>
                                <input type="text" name="exp_req" value="" class="form-control">
                              </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="form-group">
                              <label class="col-form-label"><h5>Job Description</h5></label>
                              <textarea name="job_description"  class="textarea" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                              </textarea>
                            </div>
                        </div>
                      <button type="submit" class="btn btn-large bg-green">Save</button>
                    </form>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
@endsection
@section('javascript')
<script src="{{asset("assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

<script>
$( function() {
  $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            changeMonth: true,
            changeYear: true
        });
  } );
  $(document).ready(function() {
    $('.select2').select2();
});
$('.textarea').wysihtml5();
</script>
</script>


@endsection
