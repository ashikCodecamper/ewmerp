@extends('layouts.apps')
@section('module-name','Section settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Create Section</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('section.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Section List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('section.store')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="">Section Name</label>
                        <input type="text" name="sec_name" value="{{old('sec_name')}}" class="form-control">
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
