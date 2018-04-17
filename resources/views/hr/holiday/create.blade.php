@extends('layouts.apps')
@section('stylesheet')
<link rel="stylesheet" href="{{asset("assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}" />
@endsection
@section('module-name','Holiday settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Holiday</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('holidaylist.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Holiday List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('holidaylist.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="">Holiday Name</label>
                        <input type="text" name="holiday_name" value="{{old('holiday_name')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Start date</label>
                        <input type="text" name="start_date" value="{{old('start_date')}}" class="form-control datepicker">
                      </div>
                      <div class="form-group">
                        <label for="">End date</label>
                        <input type="text" name="end_date" value="{{old('end_date')}}" class="form-control datepicker">
                      </div>
                      <button type="submit" class="btn btn-large bg-green">Save</button>
                    </form>
                  </div>
                  <div class="col-md-2"></div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection
@section('javascript')
    <script src="{{asset("assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    <script src="{{asset("assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js")}}"></script>
    <script>

        $('.datepicker').datepicker({
            format: 'yyyy/mm/dd',
            changeMonth: true,
            changeYear: true,
            autoSize: false
        });
       
    </script>
@endsection
