@extends('layouts.apps')
@section('module-name','Employee Dashboard')
@section('content')
 
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                   <a href="{{route('profile.create')}}"><button class="btn btn-primary">Add new Employee</button></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Picture</th>
                  <th>Employee Name</th>
                  <th>Designation</th>
                  <th>Email Address</th>
                  <th>Phone Number</th>
                  <th>Blood Group</th>
                  <th>Action</th>
                </tr>
      @foreach($users as $user)
                <tr>
          <td>
            @if($user->profile !=null)
              <img src="/uploads/{{$user->profile->avatar}}" height="40px" width="40px">
            @else
              <img src="/uploads/2.png" height="40px" width="40px">
            @endif
            
          </td>
          <td><a href="javascript:void(0)">{{$user->name}}</a></td>
          <td>
            @if($user->profile !=null)
              {{$user->profile->designation}}
            @endif
           
          </td>
          <td>{{$user->email}}</td>
          <td> @if($user->profile)
               {{$user->profile->mobile_number}}
            @endif</td>
          <td>
            @if($user->profile)
               {{$user->profile->blood_group}}
            @endif
          </td>
          <td>
           <a href="{{route('profile.edit',$user->id)}}"> <label class="label label-danger">Edit</label></a>
           <a href="{{route('profile.show',$user->id)}}"> <span class="label label-success">Details</span></a>
          </td>
        </tr>
      @endforeach
              </tbody></table>
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-md-6">
                  {{ $users->links() }}
                  </div>
              </div>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
         
@endsection
