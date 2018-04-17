@extends('layouts.apps')
@section('module-name','Courier settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Courier</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('courier.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Courier List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('courier.update',$courier->id)}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label for="">Courier Name</label>
                        <input type="text" name="curer_name" value="{{$courier->courier_name}}" class="form-control" required="" data-parsley-error-message="Enter Courier Name">
                      </div>
                      <button type="submit" class="btn btn-large bg-green">Update</button>
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
