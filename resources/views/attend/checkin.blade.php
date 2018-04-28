@extends('layouts.apps')
@section('module-name','Attendance')
@section('content')
<div class="row">
  <div class="box">
    <div class="box-body">
      <div class="col-10">
        <form  action="{{route('savecheckin')}}" method="post">
        {{csrf_field()}}
        <div class="row">
          <div class="form-group col-3">
            <label>Office Checkin Time</label>
            <input id="checking" type="text"  readonly value="{{$checkin}}" class="form-control">
          </div>
          <div class="form-group col-3">
            <label>Grace Period</label>
            <input type="text" readonly  value="{{$graceperiod}}" class="form-control">
          </div>
          <div class="form-group col-3">
            <label>Your Checkin Time</label>
            <input id="checkin" type="text" readonly name="in_time" value="{{$time->format('g:i A')}}" class="form-control ">
          </div>
          <div id="statu" class="form-group col-3">
            <label>Your Staus</label>
            <input id='status' type="text" name="status" value="LATE" class="form-control text-center">
          </div>
        </div>
        <div class="row">
          <div class="col-6"></div>
          <div class="col-3">
            <button type="submit"  class="btn btn-primary btn-lg">Checkin</button>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>

@endsection
@section('javascript')
<script type="text/javascript">
  $(document).ready(function () {
    var office_checkin = "{{$checkin}}";
    var grace = {{$graceperiod}};
    var checkin = "{{$time}}"; // without setting it from server it could be set with frontend with momentjs
    var checkin = checkin.substring(11);

    // testing
  //  $('#checkin').val("09:33:00");
  //  var checkin = $('#checkin').val();
    // testing end


    var ofc = office_checkin.split(':');
    var emp = checkin.split(':');

    console.log(ofc, emp);

    if (emp[0] < 9) {
      $("#status").val('ontime');
      $("#status").addClass("bg-green");
    } else if (emp[0] == 9) {
      if (emp[1] <= 30) {
        $("#status").val('ontime');
        $("#status").addClass("bg-green");
      } else {
        $("#status").val('Late');
        $("#status").addClass("bg-danger");
      }
    } else if (emp[0] >= 10) {
      $("#status").val('Late');
      $("#status").addClass("bg-danger");
    }

    console.log(ofc, grace, emp);

  })
</script>
@endsection
