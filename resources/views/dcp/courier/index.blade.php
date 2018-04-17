@extends('layouts.apps')
@section('module-name','Courier settings')
@section('content')
<div class="row">
        <div class="col-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Courier</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('courier.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Courier<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Name</th>
                  <th class="text-right">Action</th>
                </tr>
                 @if(!empty($dcpcur))
                @foreach($dcpcur as $c)
                <tr>
                  <td><a href="javascript:void(0)"><h5>{{$c->courier_name}}</h5></a></td>
                  <td class="text-right">
                    <a href="{{route('courier.edit',$c->id)}}"><span class="btn label-warning">Edit</span></a>
                    <form  action="{{route('courier.destroy',$c->id)}}" method="post" style="display:inline-block" id="form2">
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