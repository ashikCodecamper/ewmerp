@extends('layouts.apps')
@section('module-name','Leavetype settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leavetype</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('leavetype.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Leavetype<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th>Max Allowed Days</th>
                  <th class="text-right">Action</th>
                </tr>
                @if(!empty($leavetypes))
                @foreach($leavetypes as $leavetype)
                <tr>
                  <td><a href="javascript:void(0)"><h5>{{$leavetype->leave_name}}</h5></a></td>
                  <td><a href="javascript:void(0)"><h5>{{$leavetype->max_allowed_days}}</h5></a></td>
                  <td class="text-right">
                    <a href="{{route('leavetype.edit',$leavetype->id)}}"><span class="btn label-warning">Edit</span></a>
                    <form  action="{{route('leavetype.destroy',$leavetype->id)}}" method="post" style="display:inline-block" id="form2">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE" id="form1">
                      <input class="btn label-danger" type="submit" value="Delete">
                    </form>

                  </td>
				        </tr>
                @endforeach
               @endif
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection
@section('javascript')
  <script>
        document.getElementById('form2').addEventListener('submit', function(e) {
            var form = this;
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, I am sure!',
                cancelButtonText: "No, cancel it!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    swal({
                        title: 'welldone!',
                        text: 'successfully deleted!',
                        type: 'success'
                    }, function() {
                        form.submit();
                    });
                    
                } else {
                    swal("Cancelled", "Your  information is safe :)", "error");
                }
            });
        });

    </script>

@endsection