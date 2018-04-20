@extends('layouts.apps')
@section('module-name','Leave Application')
@section('stylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/themes/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/css/alertify.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.11.1/alertify.min.js"></script>
@endsection
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Apply For Leave</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>Leave List<strong></button>
              </div>
            </div>
            <div class="box-body">
              <form class="" action="{{route('savetakealeave')}}" method="post" data-parsley-validate>
                {{csrf_field()}}
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label>Available Leave balance</label>
                      <input type="text" readonly name="" value="12" class="form-control">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>Leave Type</label>
                      <select class="form-control leavedays select2" name="leave_type_id" required>
                        <option value="">--</option>
                        @foreach($leavetypes as $leavetype)
                        <option title="{{$leavetype->max_allowed_days}}" value="{{$leavetype->id}}">{{$leavetype->leave_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>From date</label>
                      <input type="text" required id="firstDate" name="" value="" class="form-control datepicker">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>To date</label>
                      <input type="text" required id="secondDate" name="" value="" class="form-control datepicker">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1"></div>
                  <div class="col-9">
                    <div class="form-group">
                      <label> Leave Description</label>
                      <textarea name="leave_desc" rows="8" cols="80" class="form-control" required></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5"></div>
                  <div class="col-3">
                    <div class="form-group">
                      <button type="submit" name="button" class="btn btn-lg btn-primary">APPLY</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
</div>
@endsection
@section('javascript')
<script>
alertify.defaults.glossary.title = '<i class="fa fa-warning fa-2x text-danger"><i>Warning!';
$(document).ready(function(){
  $('.leavedays').on('change',function(){
     selectdays = $('option:selected',$(this)).attr('title');
    console.log(selectdays);
  });

  $("#secondDate").datepicker({
    dateFormat:'yy-mm-dd',
      onSelect: function () {
        var start= $("#firstDate").datepicker("getDate");
        var end= $("#secondDate").datepicker("getDate");
        var days = (end- start) / (1000 * 60 * 60 * 24);
        if(Math.round(days)>selectdays) {
          alertify.alert("You have only "+selectdays.toString()+" days allowed for This type of leave");
          $("#secondDate").val('');
        }
      },
  });

  $( ".datepicker" ).datepicker({
    changeYear:true,
    changeMonth: true,
    dateFormat:'yy-mm-dd',
  });






});
</script>


@endsection
