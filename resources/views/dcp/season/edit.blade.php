@extends('layouts.apps')
@section('module-name','Season settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update Season</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('season.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Season List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('season.update',$season->id)}}" method="post" data-parsley-validate>
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <label for="">Season Name</label>
                        <input type="text" name="sea_name" value="{{$season->sea_name}}" class="form-control" required="">
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
