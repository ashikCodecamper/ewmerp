@extends('layouts.apps')
@section('module-name','Employee Dashboard')
@section('content')

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Job vacancy List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Applicant Name</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>CV</th>
                  <th>Action</th>
                </tr>
      @foreach($jobapplicants as $jobapplicant)
         <tr>

            <td>{{$jobapplicant->full_name}}</td>
            <td>{{$jobapplicant->email}}</td>
            <td>
            {{$jobapplicant->mobile}}
            </td>
            <td>
               <a href="{{asset('storage/'.$jobapplicant->cv.'')}}" target="_blank">Download</a>
            </td>
        </tr>
      @endforeach
              </tbody></table>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  </div>
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

@endsection
