@extends('layouts.apps')
@section('module-name','Office Time Setup')
@section('stylesheet')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
@endsection
@section('content')

<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Set Out Time</h3>

              <div class="box-tools" style="float:right;">
                  <a href="#"><button type="buton" class="btn bg-purple btn-lg" ><strong>Time List<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <form class="" action="{{route('saveofficeouttime')}}" method="post">
                      {{csrf_field()}}
                      <div class="form-group bootstrap-timepicker timepicker">
                        <label for="">Time</label>
                        <input type="text" id="timepicker1" name="out_time" value="" class="form-control">

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
<script type="text/javascript">
      $('#timepicker1').timepicker({
        timeFormat: 'h:mm p',
    dropdown: true,
    scrollbar: true
      });
</script>
@endsection
