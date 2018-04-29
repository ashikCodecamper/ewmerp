@extends('layouts.apps')

@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">

    .modal .modal-dialog{
      max-width: 80% !important;
    }
      .modal-body {
          overflow-x: auto;
      }
    </style>
    </style>
@endsection
@section('module-name','PCP :: Lab-Dip')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lab-Dip</h3>

              <div class="box-tools" style="float:right;">

                  <a href="{{route('labdip.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Lab-Dip<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-bordered">
                <tr>
                  <th>#</th>
                  <th>Proto</th>
                  <th>Main Color</th>
                  <th>Sub Colors</th>
                  <th>Submission Date</th>
                  <th>Parcel Track No.</th>
                  <th>UK Arrival Date</th>
                  <th>Recieve Date</th>
                  <th>Poms Date</th>
                  <th>Comment</th>
                  <th>Comment Date</th>
                  <th>Remark</th>
                  <th class="text-center" width="130">Action</th>
                </tr>

              @foreach($labdips as $labdip)

                <tr>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample">{{$loop->index+1}}</td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample">{{$labdip->dcp->proto}}</td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td width="130s" data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></td>
                  <td></td>
                  <td class="text-center">
                    <i class="fas fa-angle-double-down fa-2x text-primary text-center" data-toggle="collapse" data-target=".{{$labdip->proto_id}}" aria-expanded="false" aria-controls="collapseExample"></i>
                  </td>
                  @foreach($labdip->colors as $c)
                  <tr class="collapse {{$labdip->proto_id}}">
                    <td></td>
                    <td></td>
                    <td>{{$c->main_color}}</td>
                    <td>{{$c->sub_colors}}</td>
                    <td>{{$c->submission_date}}</td>
                    <td>{{$c->parcel_no}}</td>
                    <td>{{$c->uk_arrive_date}}</td>
                    <td>{{$c->uk_recieve_date}}</td>
                    <td>{{$c->poms_date}}</td>
                    <td>{{$c->first_submission_cmnt}}</td>
                    <td>{{$c->comment_date}}</td>
                    <td>{{$c->revised_comment}}

                    @if($c->status == 0)
                    <td  width="160">
                      <a href="{{route('labdip.edit', ['id' => $c->id])}}"><i class="fas fa-edit fa-2x"></i></a>
                      <a href="{{route('labdip.approve', ['id'=>$c->id])}}"><i class="fas fa-check fa-2x text-success"></i></a>
                      <a href="{{route('labdip.reject', ['id'=>$c->id])}}"><i class="fas fa-times fa-2x text-danger"></i></a>

                      <a href="#" id="{{$c->id}}" class="mshit"><i class="fas fa-align-center fa-2x"></i></a>

                    </td>
                    @else
                    <td class="text-center">
                      <a href="{{route('labdip.approve', ['id'=>$c->id])}}"><button class="btn btn-sm btn-warning">Not Approve</button></a>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                </tr>
				        </tr>
            @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-center">color submission log</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

            </div>
          </div>
        </div>
      </div>

      </div>
@endsection

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@section('javascript')
 <!--  <script>
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
    </script> -->
    <script type="text/javascript">
      $('document').ready(function () {
        $('.mshit').click(function () {

          console.log(this.id)
          var h = ""

          axios.get('rejectlog',{
            params: {
              id: this.id
            }
          }).then(function (res) {
            console.log(res.data)
            if (res.data.length) {

              h += "<table class='table'><tr><th>Sub Colors</th><th>Submission Date</th><th>Parcel Track No.</th><th>UK Arrival Date</th><th>Recieve Date</th><th>Poms Date</th><th>Comment</th><th>Comment Date</th><th>Remarks</th></tr>"

              res.data.forEach(function (el) {
                h += `<tr><td>${el.sub_colors}</td><td>${el.submission_date}</td><td>${el.parcel_no}</td><td>${el.uk_arrive_date}</td><td>${el.uk_recieve_date}</td><td>${el.poms_date}</td><td>${el.first_submission_cmnt}</td><td>${el.comment_date}</td><td>${el.revised_comment}</tr>`
              })
              h += "</table>"
            } else {
              h += "<h2> There is no rejections for this main_color</h2>"
            }
             $('.modal-body').html(h);

          })
          .catch(function (err) {

          })

          $('#myModal').modal('show');
        })
      })
    </script>

@endsection
