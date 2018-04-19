@extends('layouts.apps')
@section('module-name','Attendance')
@section('content')
<div class="row">
  <div class="box">
    <div class="box-body">
      <div class="col-10">
        <div class="row">
          <div class="form-group col-3">
            <label>Office Checkin Time</label>
            <input type="text" name="" readonly value="9:00 AM" class="form-control">
          </div>
          <div class="form-group col-3">
            <label>Grace Period</label>
            <input type="text" readonly name="" value="10 Minutes" class="form-control">
          </div>
          <div class="form-group col-3">
            <label>Your Checkin Time</label>
            <input type="text" readonly name="" value="{{$time->format('g:i A')}}" class="form-control">
          </div>
          <div class="form-group col-3">
            <label>Your Staus</label>
            <input type="text" name="" value="LATE" class="form-control bg-warning">
          </div>
        </div>
        <div class="row">
          <div class="col-6"></div>
          <div class="col-3">
            <button type="button" name="button" class="btn btn-primary btn-lg">Checkin</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
