@extends('layouts.apps')
@section('module-name','Employee Attendance')
@section('content')
<table class="table table-striped">
  <thead>
    <th>Date</th>
    <th>Employee Name</th>
    <th>In Time</th>
    <th>Out Time</th>
    <th>Status</th>
  </thead>
  <tbody>
  @foreach($attends as $attend)
    <tr>
      <td>{{ $attend->created_at->format('d M Y') }}</td>
      <td>{{$attend->user->name}}</td>
      <td>{{$attend->in_time}}</td>
      <td>{{$attend->out_time}}</td>
      <td>
        <button class="btn btn-primary">Present</button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
