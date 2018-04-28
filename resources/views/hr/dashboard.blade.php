@extends('layouts.apps')
@section('module-name','Human Resources')
@section('content')
    <div class="row">

        <div class="col-sm-6">
            <h4>Employee and Attendance</h4>
            <ul>
                <li><a href="{{route('profile.index')}}">Employee</a></li>
                <li><a href="{{route('attend')}}">Attendance</a></li>
                <li><a href="#">Upload Attendance</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h4>Recruitment</h4>
            <ul>
                <li><a href="{{route('jobapplicant.index')}}">Job Applicant</a></li>
                <li><a href="{{'jobopenning'}}">Job Opening</a></li>
                <li><a href="#">Offer Letter</a></li>
            </ul>
        </div>

        <div class="col-sm-6">
            <h4>Leaves and Holiday</h4>
            <ul>
                <li><a href="{{route('viewleaveapp')}}">Leave Application</a></li>
                <li><a href="{{route('leavetype.index')}}">Leave Type</a></li>
                <li><a href="{{route('holidays')}}">Holiday List</a></li>
                <li><a href="#">Leave Allocation</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
          <h4>Attendance Settings</h4>
          <ul>
              <li><a href="{{route('officetime')}}">Checkin Time Setup</a></li>
              <li><a href="{{route('graceperiod')}}">Grace Period Setup</a></li>
              <li><a href="{{route('officeouttime')}}">Check Out Time Setup</a></li>
          </ul>
        </div>
        <div class="col-sm-6">
            <h4>HR Settings</h4>
            <ul>
                <li><a href="{{route('emptype.index')}}">Employment Type</a></li>
                <li><a href="{{route('section.index')}}">Section</a></li>
                <li><a href="{{route('department.index')}}">Department</a></li>
                <li><a href="{{route('designation.index')}}">Designation</a></li>
            </ul>
        </div>
        <div class="col-sm-6">
          <h4>Reports</h4>
          <ul>
              <li><a href="#">Employees working on a holiday</a></li>
              <li><a href="#">Monthly Attendance Sheet</a></li>
          </ul>
        </div>
    </div>
@endsection
