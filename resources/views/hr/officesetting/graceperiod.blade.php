@extends('layouts.apps')
@section('module-name','Office Time Setup')
@section('content')

<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Set In Time</h3>

              <div class="box-tools" style="float:right;">
                  <a href="#"><button type="buton" class="btn bg-purple btn-lg" ><strong>Time List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('savegraceperiod')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group">
                        <label for="">Time in Minute</label>
                        <input type="text" id="timepicker1" name="grace_period" value="" placeholder="Minutes" class="form-control">

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
