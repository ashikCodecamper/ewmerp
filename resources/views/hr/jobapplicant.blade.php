@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css')}}">

@endsection
@section('module-name','Human Resources')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job Applicant</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>New<strong></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <th>Applicant Name</th>
                  <th>Applied Post</th>
                  <th>Email Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @if(!empty($jobs))
                @foreach($jobs as $job)
                <tr>
                  <td>{{$job->job_title}}</a></td>
                  <td>{!! $job->job_desc !!}</td>
                  <td>{{$job->job_deadline}}</td>
                  @if($job->status == 'open')
                  <td><p class="text-success">{{$job->status}}</p></td>
                  @elseif($job->status == 'closed')
                  <td><p class="text-danger">{{$job->status}}</p></td>
                  @endif
                  <td>
                    <span class="label label-warning">Edit</span>
                    <span class="label label-danger">Delete</span>
                  </td>
				        </tr>
                @endforeach
               @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Job Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
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
        <form action="{{route('createjobopenning')}}" method="post" data-parsley-validate>
        {{csrf_field()}}
          <div class="form-group">
            <label for="" class="col-form-label">Applicant Name</label>
            <input type="text" required name="applicant_name" value="" class="form-control">
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Email address</label>
            <input type="text" required name="applicant_name" value="" class="form-control">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="" class="col-form-label">Available Post</label>
                <select  name="applied_post" class="form-control">
                  <option value="">Please Select</option>
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Status</label>
                <select name="status"  class="form-control" required>
                  <option value="">Please select</option>
                  <option value="open">Open</option>
                  <option value="replied">Replied</option>
                  <option value="rejected">Rejected</option>
                  <option value="hold">Hold</option>
                </select>
              </div>
            </div>
          </div>

          <div class="box">
                      <div class="box-header">

                          <small>Cover Letter</small>

                        <!-- tools box -->

                        <!-- /. tools -->
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body pad">
                          <textarea name="cover_letter" class="textarea" placeholder="Place job description here"
                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
                    </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
        </form>
      </div>



    </div>
  </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('assets/vendor_components/select2/dist/js/select2.full.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
$( function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
  } );
  $(document).ready(function() {
    $('.select2').select2();
});
$('.textarea').wysihtml5();
</script>
</script>


@endsection
