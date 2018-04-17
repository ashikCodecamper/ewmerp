@extends('layouts.apps')
@section('module-name','Profile')
@section('content')

      <div class="row">
        <div class="col-xl-4 col-lg-5">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="/uploads/{{$user->profile->avatar}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->profile->designation}}</p>
				
              <div class="row">
              	<div class="col-12">
              		<div class="profile-user-info">
						<p>Email address </p>
						<h6 class="margin-bottom">{{$user->email}}</h6>
						<p>Phone</p>
						<h6 class="margin-bottom">{{$user->profile->mobile_number}}</h6> 
						<p>Address</p>
						<h6 class="margin-bottom">{{$user->profile->present_addr}}</h6>
					</div>
             	</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xl-8 col-lg-7">
          <div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Basic Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
	          				<div class="col-md-4">
	          					<div class="form-group">
							     	<label for="input1">Date Of Birth</label>
							    	<input class="form-control" id="input1" readonly  type="text" value="{{ $user->profile->dob }}">
								</div>
	          				</div>
		          			<div class="col-md-4">
			          				<div class="form-group">
							     	<label for="input2">Joining date</label>
							    	<input class="form-control" id="input2" readonly  type="text" value="{{ $user->profile->join_date }}">
								</div>
		          			</div>
		          			<div class="col-md-4">
		          				<div class="form-group">
							     	<label for="input3">Blood Group</label>
							    	<input class="form-control" id="input3" readonly  type="text" value=" {{$user->profile->blood_group}}">
							</div>
          				</div>
          			</div>
          	</form>
        </div>
        <!-- /.box-body -->
   </div>  <!-- /.box-end -->

    <div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Designation Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
	          				<div class="col-md-4">
	          					<div class="form-group">
							     	<label for="input1">Department</label>
							    	<input class="form-control" id="input1" readonly  type="text" value="{{$user->profile->department}}">
								</div>
	          				</div>
		          			<div class="col-md-4">
			          				<div class="form-group">
							     	<label for="input2">Section</label>
							    	<input class="form-control" id="input2" readonly  type="text" value="{{$user->profile->section}}">
								</div>
		          			</div>
		          			<div class="col-md-4">
		          				<div class="form-group">
							     	<label for="input3">Designation</label>
							    	<input class="form-control" id="input3" readonly  type="text" value="{{$user->profile->designation}}">
							</div>
          				</div>
          			</div>
          	</form>
        </div>
        <!-- /.box-body -->
   </div>  <!-- /.box-end -->
    <div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Contact Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
	          				<div class="col-md-4">
	          					<div class="form-group">
							     	<label for="input1">Mobile Number</label>
							    	<input class="form-control" id="input1" readonly  type="text" value="{{ $user->profile->mobile_number}}">
								</div>
	          				</div>
		          			<div class="col-md-4">
			          				<div class="form-group">
							     	<label for="input2">Emergency Contact Number</label>
							    	<input class="form-control" id="input2" readonly  type="text" value="{{$user->profile->emg_contact_number }}">
								</div>
		          			</div>
		          			<div class="col-md-4">
		          				<div class="form-group">
							     	<label for="input3">Other</label>
							    	<input class="form-control" id="input3" readonly  type="text">
							</div>
          				</div>
          			</div>
          	</form>
        </div>
        <!-- /.box-body -->
   </div>  <!-- /.box-end -->

    <div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Passport Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
		          			<div class="col-md-4">
			          				<div class="form-group">
							     	<label for="input2">Passport Number</label>
							    	<input class="form-control" id="input2" readonly  type="text" value="{{$user->profile->passport_number }}" >
								</div>
		          			</div>
		          			<div class="col-md-4">
		          				<div class="form-group">
							     	<label for="input3">Expire date</label>
							    	<input class="form-control" id="input3" readonly  type="text" value="{{$user->profile->exp_date }}">
							</div>
          				</div>
          			</div>
          	</form>
        </div>
        <!-- /.box-body -->
   </div>  <!-- /.box-end -->

    <div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Address Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
	          			<div class="col-md-6">
	          				<div class="form-group">
							     <label for="input1">Present Address</label>
							    <textarea readonly  class="form-control">{{$user->profile->present_addr}}</textarea>
							</div>
	          			</div>
		          		<div class="col-md-6">
			          		<div class="form-group">
							    <label for="input2">Permanent Address</label>
							    <textarea readonly class="form-control">{{$user->profile->permanent_addr}}</textarea>
							</div>
		          		</div>
          			</div>
          		</form>
        </div>
        <!-- /.box-body -->
   </div> 
    <!-- /.box-end -->
	
	<div class="box">
          	
        	<div class="box-header with-border">
	         	 <h3 class="box-title">Other Information</h3>

	          	<div class="box-tools pull-right">
	            	<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
	             	 <i class="fa fa-minus"></i></button>
	          	</div>
        	</div>
        	<div class="box-body">
          		<form action="" class="form-element">
          			<div class="row">
	          			<div class="col-md-6">
	          				<div class="form-group">
							     <label for="input1">Educational Background</label>
							    <textarea readonly class="form-control">{{$user->profile->edu_back}}</textarea>
							</div>
	          			</div>
		          		<div class="col-md-6">
			          		<div class="form-group">
							    <label for="input2">Previous Office Information</label>
							    <textarea readonly class="form-control" >{{$user->profile->pre_office_info}}</textarea>
							</div>
		          		</div>
          			</div>
          		</form>
        </div>
        <!-- /.box-body -->
   </div> 
    <!-- /.box-end -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    @endsection