@extends('layouts.apps')
@section('title','takealeave');
@section('module-name','Leave Application')
@section('stylesheet')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
              <form class="" action="index.html" method="post">
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
                      <input type="text" name="" value="" class="form-control">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>From date</label>
                      <input type="date" name="" value="" class="form-control datepicker">
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label>To date</label>
                      <input type="date" name="" value="" class="form-control datepicker">
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
$( function() {
    $( ".datepicker" ).datepicker({
      changeYear:true,
      changeMonth: true,
      dateFormat:'yy-mm-dd',
    });
  } );
</script>


@endsection
