@extends('layouts.apps')
@section('module-name','Office Time Setup')
@section('stylesheet')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
@endsection
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
                    @if(isset($intime[0]))
                    <table class="table table-stripe">
                      <th>
                        <tr>
                            <td>#</td>
                            <td>Time</td>
                            <td>Action</td>
                        </tr>
                      </th>
                      <tbody>

                          @foreach($intime as $t)
                            <td>#</td>
                            <td>{{$t->in_time}}</td>
                            <td><button class="btn btn-sm btn-warning">Edit</button</td>
                          @endforeach
                        </tbody>
                        @else
                        <h4>You haven't set office in time yet</h4>
                        <button class="btn btn-primary"><a href="{{route('officetime')}}">Set In Time</a></button>
                        @endif

                    </table>
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
        timeFormat: 'HH:mm:ss',
      });
</script>
@endsection
