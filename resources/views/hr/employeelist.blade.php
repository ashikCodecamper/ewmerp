@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="{{asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}" />
@endsection
@section('module-name','Human Resources')
@section('content')
<div class="box>
<div class="box-header">
  <h3 class="box-title">Employee Information Table  <button class="btn btn-lg btn-primary float-right" data-toggle="modal" data-target="#exampleModal"> New </button> </h3>

  <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF, Print</h6>
</div>
<!-- /.box-header -->
<div class="box-body">
  <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
    <thead>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Phone Number</th>
            <th>D. of Birth</th>
            <th>Section</th>
        </tr>
    </thead>
    <tbody>
      @if(!empty($emps))
      @foreach($emps as $emp)
        <tr>
            <td>{{$emp->full_name}}</td>
            <td>{{$emp->designation}}</td>
            <td>{{$emp->dep}}</td>
            <td>{{$emp->phone}}</td>
            <td>{{$emp->dob}}</td>
            <td>Production</td>
        </tr>
        @endforeach
       @endif
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Phone Number</th>
            <th>Date of Birth</th>
            <th>Section</th>
        </tr>
    </tfoot>
</table>


</div>
<!-- /.box-body -->
</div>
<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
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
        <form action="{{route('createhremployee')}}" method="POST">
        {{csrf_field()}}
          <div class="form-group has-warning">

            <label for="" class="col-form-label">Full Name</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control">

            <div class="row">
                <div class="col-md-6">
                <label for="" class="col-form-label">Date Of Birth</label>
                <input type="text" name="dob" value="{{ old('dob') }}" class="form-control datepicker" >
                </div>
                <div class="col-md-6">
                    <label for="" class="col-form-label">Joining Date</label>
                    <input type="text" name="joindate" value="{{ old('joindate') }}" class="form-control datepicker" >
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="">NID</label>
                    <input type="text" name="nid" value="{{ old('nid') }}" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for=""> Section </label>
                    <select name="section" id="" class="form-control">
                        @if(!empty($secs))
                            @foreach($secs as $sec)
                            <option value="{{$sec->sec_name}}">{{$sec->sec_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <label for="">Department</label>
                    <select name="dep" id="" class="form-control">
                    @if(!empty($deps))
                        @foreach($deps as $dep)
                        <option value="{{$dep->dep_name}}">{{$dep->dep_name}}</option>
                        @endforeach
                     @endif
                     </select>
                </div>
                <div class="col-md-6">
                    <label for="">Designation</label>
                    <select name="designation" id="" class="form-control">
                    @if(!empty($degis))
                        @foreach($degis as $deg)
                        <option value="{{$deg->deg_name}}">{{$deg->deg_name}}</option>
                        @endforeach
                    @endif
                    </select>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Email Address</label>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">Mobile Number</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    </div>
                </div>
                <label for="">Residence Address</label>
                <textarea name="addr" id="" cols="30" rows="3" class="form-control"></textarea>

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

 <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js")}}"></script>


    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js")}}"></script>
    <script src="{{asset("assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>

	<script src="{{asset("js/pages/data-table.js")}}"> </script>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
        });
        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
        });
    </script>
@endsection
