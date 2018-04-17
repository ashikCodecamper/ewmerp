@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Proto Information Entry</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('dcpsteponecreate')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Proto/Style<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Sl no.</th>
                  <th>Season</th>
                  <th>Brand</th>
                  <th>Level</th>
                  <th>Category</th>
                  <th>Proto.</th>
                  <th>Color</th>
                  <th>Style</th>
                  <th>Yarn</th>
                  <th class="text-right">Action</th>
                </tr>
              @if(!empty($data))
              	@foreach($data as $d)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><a href="javascript:void(0)">{{$d->sl_no}}</a></td>
                  <td>{{$d->sea_name}}</td>
                  <td>{{$d->brand_name}}</td>
                  <td>{{$d->label_name}}</td>
                  <td>{{$d->name}}</td>
                  <td>{{$d->proto}}</td>
                  <td>{{$d->clr_name}}</td>
                  <td>{{$d->style_code}}</td>
                  <td>{{$d->yarn}}</td>
                  <td class="text-right">
                    <a href="{{route('dcpsteponedit',$d->id)}}"><span class="btn label-warning">Edit</span></a>
                    <form  action="{{route('dcpdestroy',$d->id)}}" method="post" style="display:inline-block" id="form2">
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
