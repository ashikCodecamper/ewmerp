@extends('layouts.apps')
@section('module-name','Department settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Department</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('department.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Department List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('department.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="">Department Name</label>
                        <input type="text" name="dep_name" value="{{old('dep_name')}}" class="form-control">
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
