@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{asset('assets/vendor_components/select2/dist/css/select2.min.css')}}">

@endsection
@section('module-name','Human Resources')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Attendance</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>New<strong></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <th>Name</th>
                  <th>Department</th>
                  <th>Designation</th>
                  <th>Area</th>
                  <th>Attendance Date</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                @if(!empty($attendances))
                @foreach($attendances as $attendance)
                <tr>
                  <td>{{$attendance->full_name}}</a></td>
                  <td>{{$attendance->dep}}</td>
                  <td>{{$attendance->designation}}</td>
                  <td>{{$attendance->section}}</td>
                  <td>{{$attendance->attend_dates}}</td>
                  @if($attendance->status == 'Present')
                  <td><p class="text-success">{{$attendance->status}}</p></td>
                  @elseif($attendance->status == 'Absent')
                  <td><p class="text-danger">{{$attendance->status}}</p></td>
                  @elseif($attendance->status == 'Half Day')
                  <td><p class="text-warning">{{$attendance->status}}</p></td>
                  @elseif($attendance->status == 'On Leave')
                  <td><p class="text-primary">{{$attendance->status}}</p></td>
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
        <h5 class="modal-title" id="exampleModalLabel">New Attendance</h5>
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
        <form action="{{route('createattandance')}}" method="post" data-parsley-validate>
        {{csrf_field()}}
          <div class="form-group">
            <label for="" class="col-form-label">Name</label>
            <select name="employee_id" required value="{{ old('employee_id') }}" class="form-control select2" style="width: 100%;">
              <option value="">Please Select</option>
              @if(!empty($employees))
                @foreach($employees as $employee)
                  <option value="{{$employee->id}}">{{$employee->full_name}}</option>
                @endforeach
              @endif
            </select>
          </div>
          <div class="form-group">
            <label for="" class="col-form-label">Attendance Date</label>
            <input type="text" required name="attend_dates" value="{{ old('attend_dates') }}" class="form-control datepicker">
          </div>
          <div class="form-group">
            <label for=""  class="col-form-label">Status</label>
            <select name="status" class="form-control" required>
              <option value="">Please select</option>
              <option value="Present">Present</option>
              <option value="Absent">Absent</option>
              <option value="Half Day">Half Day</option>
              <option value="On Leave">On Leave</option>
            </select>
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

<script>

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
});
$( function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd",minDate: 0,
    maxDate: 0});
  } );
  $(document).ready(function() {
    $('.select2').select2();
});
</script>
</script>


@endsection
