@extends('layouts.apps')
@section('module-name','Approved List')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">DCP-Approved List</h3>

              <div class="box-tools" style="float:right;">
                <form action="{{route('excelexport')}}" enctype="multipart/form-data">
                    <button class="btn btn-info" type="submit">Excel Export</button>
                    <hr>
                </form> &nbsp;
              
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>Sl no.</th>
                  <th>Brand</th>
                  <th>Supplier</th>
                  <th>Proto No.</th>
                  <th>Proto Received Date</th>
                  <th>Yarn/Febric Composition</th>
                  <th>Product Description</th>
                  <th>FOB Price</th>
                  <th>Target Price</th>
                 
                </tr>
              @if(!empty($steptwolist))
              	 @foreach($steptwolist as $st)
                <tr>
                  <td><a href="javascript:void(0)">{{$st->sl_no}}</a></td>
                
                  <td>{{$st->brand_name}}</td>
               
                  <td>{{$st->sup_name}}</td>
                  <td>{{$st->proto}}</td>
                  <td>{{$st->proto_rcv_date}}</td>
                  <td>{{$st->yarn}}</td>
                  <td>{{$st->prdct_des}}</td>
                  <td>{{$st->fob_price}}</td>
                  <td >{{$st->target_price}}</td>
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