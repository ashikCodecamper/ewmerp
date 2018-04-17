@extends('layouts.apps')
@section('module-name','Human Resources')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employment Type</h3>

              <div class="box-tools" style="float:right;">
                    <button type="buton" class="btn bg-purple btn-lg" data-toggle="modal" data-target="#exampleModal"><strong>New<strong></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                 
                </tr>
                @if(!empty($empt))
                @foreach($empt as $emp)
                <tr>
                  <td><a href="javascript:void(0)">{{$emp->emp_name}}</a></td>
                  <td>-------</td>
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
        <h5 class="modal-title" id="exampleModalLabel">New Designation</h5>
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
        <form action="{{route('createemptype')}}" method="post">
        {{csrf_field()}}
          <div class="form-group has-warning">
            <label for="" class="col-form-label">Employment Type</label>
            <input type="text" name="emp_name" value="{{ old('emp_name') }}" class="form-control">
            <p hidden class="help-box small text-muted hidden-xs">Legal already exists. Select another name</p>
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