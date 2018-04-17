@extends('layouts.apps')
@section('module-name','emptype settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create emptype</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('emptype.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>emptype List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('emptype.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="">emptype Name</label>
                        <input type="text" name="emp_name" value="{{old('emp_name')}}" class="form-control">
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
