@extends('layouts.apps')
@section('module-name','Check Out')
@section('content')
<form action="{{route('savecheckout')}}" method="post">
  {{csrf_field()}}
<div class="row">
  <div class="col-3"></div>
  <div class="col-6">
    <div class="row">
      <div class="col-5">
        <div class="form-group">
          <label>Office Check Out Time</label>
          <input type="text" readonly value="{{date('h:i A', strtotime($out))}}" class="form-control">
        </div>
      </div>
      <div class="col-4">
        <div class="form-group">
          <label>Current Time</label>
          <input type="text" readonly name="out_time" value="{{date("h:i A")}}" class="form-control">
        </div>
      </div>
    </div>
    <button class="btn btn-primary" type="submit">Check Out</button>
  </div>
  <div class="col-3"></div>
</div>
</form>
@endsection
