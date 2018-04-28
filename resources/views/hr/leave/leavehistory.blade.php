@extends('layouts.apps')
@section('module-name','Leave history')
@section('content')
<table class="table table-striped">
  <thead>
    <th>Leave Type</th>
    <th>Description</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Status</th>
  </thead>
  <tbody>
    @if(isset($leaves))
    @foreach($leaves as $leave)
    <tr>
      <td>{{$leave->leavetype->leave_name}}</td>
      <td>{{$leave->leave_desc}}</td>
      <td>{{$leave->from_date}}</td>
      <td>{{$leave->to_date}}</td>
      <td>
        @if($leave->status === 1)
       <button class="btn btn-success">Approved</button>
        @elseif($leave->status === 2)
        <button  class="btn btn-warning">Rejected</button>
        @else
        <button  class="btn btn-primary">Pending</button>
        @endif
      </td>
    </tr>
    @endforeach

    @endif
  </tbody>
</table>


@endsection
