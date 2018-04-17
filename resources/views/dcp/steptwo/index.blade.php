@extends('layouts.apps')
@section('module-name','DCP :: Price Matrix')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DCP- Price Matrix</h3>

              <div class="box-tools" style="float:right;">

                  <a href="{{route('getdcpsteptwo')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Price Matrix<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Src no.</th>
                  <th>Proto</th>
                  <th>Fob Price</th>
                  <th>Target Price</th>
                  <th>Supplier</th>
                  <th>Courier</th>
                  <th>Submission Date</th>
                  <th>Parcel Track No.</th>
                  <th>UK Arrival Date</th>
                  <th class="text-right">Action</th>
                </tr>
              @if(!empty($steptwolist))
              	 @foreach($steptwolist as $st)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td><a href="javascript:void(0)">{{$st->sl_no}}</a></td>
                    <td>{{$st->proto}}</td>
                 <td>{{$st->fob_price}}</td>
                  <td>{{$st->target_price}}</td>
                  <td>{{$st->supplier_name}}</td>
                  <td>{{$st->courier_name}}</td>
                  <td>{{$st->submission_date}}</td>
                  <td>{{$st->prcl_track_no}}</td>
                  <td>{{$st->uk_arrival}}</td>
                  <td class="text-right">

                  <a href="{{route('dcpsteptwoedit',$st->id)}}"><span class="btn label-warning">Edit</span></a>
                 <form  action="{{route('dcpsteptwodestroy',$st->id)}}" method="post" style="display:inline-block" id="form2">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value="DELETE" id="form1">
                      <input class="btn label-danger" type="submit" value="Delete">
                    </form>
                     <a href="{{route('dcpapprove',$st->id)}}"><span class="btn label-success">Approve</span></a>
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
