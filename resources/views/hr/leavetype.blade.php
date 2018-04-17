@extends('layouts.apps')
@section('module-name','Human Resources')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leave Type</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>New<strong></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <th>Name</th>
                  <th class="text-center">Max Days Leave Allowed</th>
                  <th>Action</th>

                </tr>
                @if(!empty($leavetypes))
                @foreach($leavetypes as $leavetype)
                <tr>
                  <td><a href="javascript:void(0)">{{$leavetype->leave_name}}</a></td>
                  <td class="text-center">{{$leavetype->max_allowed_days}}</td>
                  <td>
                    <span class="label label-warning">Edit</span>
                    <span class="label label-danger">Delete</span>
                  </td>
				        </tr>
                @endforeach
               @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Leave Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form action="{{route('createleavetype')}}" method="post">
        {{csrf_field()}}
          <div class="form-group has-warning">
            <label for="" class="col-form-label">Leave Type Name</label>
            <input type="text" name="leave_name" value="{{ old('leave_name') }}" class="form-control">

          </div>
          <div class="form-group has-warning">
            <label for="" class="col-form-label">Max Days Leave Allowed</label>
            <input type="text" name="max_allowed_days" value="{{ old('max_allowed_days') }}" class="form-control">

          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save </button>
        </form>
      </div>



    </div>
  </div>
</div>
@endsection
@section('javascript')
<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>


@endsection
