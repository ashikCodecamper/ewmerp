@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('module-name','Human Resources')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leave Application</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>New<strong></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <th>Name</th>
                  <th class="text-center">Designation</th>
                  <th class="text-center">From Date</th>
                  <th class="text-center">To Date</th>
                  <th class="text-center">Leave Days</th>
                  <th class="text-center">Leave Type</th>
                  <th class="text-center">Status</th>
                  <th>Action</th>

                </tr>
                @if(!empty($leaveapplications))
                  @foreach($leaveapplications as $leaveapplication)
                <tr>
                  <td>{{$leaveapplication->full_name}}</td>
                  <td class="text-center">
                    {{$leaveapplication->designation}}
                  </td>
                  <td class="text-center">{{$leaveapplication->from_date}}</td>
                  <td class="text-center">{{$leaveapplication->to_date}}</td>
                  <td class="text-center">{{$leaveapplication->leave_days}}</td>
                  <td class="text-center">{{$leaveapplication->leave_name}}</td>
                  <td class="text-center">{{$leaveapplication->status}}</td>
                  <td>
                    <span class="label label-warning">Edit</span>
                    <span class="label label-danger">Delete</span>
                  </td>
				        </tr>
                  @endforeach
                @else
                <tr>
                  <td>No leave Application Found</td>
                </tr>
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
        <h5 class="modal-title" id="exampleModalLabel">New Leave Type</h5>
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
        <form action="{{route('createleaveapplication')}}" method="post" data-parsley-validate>
        {{csrf_field()}}
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Employee Name</label>
                  <select name="employee_id" required class="form-control">
                    <option value="">Please select</option>
                    @if(!empty($employees))
                    @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->full_name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">LeaveType</label>
                  <select name="leavetype_id" class="form-control" required>
                    <option value="">please select</option>
                    @if(!empty($leavetypes))
                    @foreach($leavetypes as $leavetype)
                    <option value="{{$leavetype->id}}">{{$leavetype->leave_name}}- Max {{$leavetype->max_allowed_days}} Days</option>
                    @endforeach
                    @endif
                  </select>
                </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">From Date</label>
                <input type="text" name="from_date" required class="form-control datepicker" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">To Date</label>
                <input type="text" name="to_date" required class="form-control datepicker">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Reason</label>
                <textarea name="reason" required class="form-control"rows="4" cols="80"></textarea>
              </div>
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
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
$( function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
  } );
</script>


@endsection
