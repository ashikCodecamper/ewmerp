@extends('layouts.apps')
@section('module-name','PCP :: Red/Dev Sample')
@section('content')
<div class="row">
        <div class="col-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lab-Dip</h3>

              <div class="box-tools" style="float:right;">

                  <a href="{{route('seal01.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Add New Seal<strong></button></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Proto</th>
                  <th>Seal Type</th>
                  <th>Plan Date</th>
                  <th>Actual Submission Date</th>
                  <th>Awb Details</th>
                  <th>Comment</th>
                  <th>Comment Date</th>
                  <th>Remark</th>
                  <th class="text-right">Action</th>
                </tr>

                @foreach($sealones as $sealone)
                <tr>
                  <td>{{$loop->index += 1}}</td>
                  <td>{{$sealone->dcpone->proto}}</td>
                  <td>{{$sealone->seal_type}}</td>
                  <td>{{ date( 'jS M Y', strtotime($sealone->plan_date)) }}</td>
                  <td>{{ date('jS M Y', strtotime($sealone->submission_date))}}</td>
                  <td>{{$sealone->awb_details}}</td>
                  <td>{{$sealone->comment}}</td>
                  <td>{{date('jS M Y', strtotime($sealone->comment_date))}}</td>
                  <td>{{$sealone->rev_comment}}</td>


                  <td class="text-right">
                    @if ($sealone->status)
                      <a href="{{route('seal01.approve', ['id'=>$sealone->id])}}"><span class="btn label-warning">undo approve</span></a>
                    @else
                      <a href="{{route('seal101.edit', ['id'=>$sealone->id])}}"><span class="btn label-warning">edit</span></a>
                      <a href="{{route('seal01.approve', ['id'=>$sealone->id])}}"><span class="btn label-success">approve</span></a>
                      <a href="{{route('seal01.reject', ['id'=>$sealone->id])}}"><span class="btn label-primary">reject</span></a>
                      <a href="#"><span id={{$sealone->id}} class="btn label-danger mshit">log</span></a>
                  @endif
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center">seal submission log</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
        </div>
      </div>
    </div>
@endsection

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
@section('javascript')
  <script>
        // this is so far good and not gonna work that much
        // is not that much good code over Here
        /*
          => form a graph with a number as a node and their prime factors as their edges number which are other node
          => now run bfs from that number and run untill every connected number is greater that the expected node
          => if (visited) then ouput the step
          => else -1 not possible to transform the number from that number to this number
          => else
        */
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

    <script type="text/javascript">
      $('document').ready(function () {
        $('.mshit').click(function () {

          console.log(this.id)
          var h = ""

          axios.get('{{route('seal01.rejectlog')}}',{
            params: {
              id: this.id
            }
          }).then(function (res) {
            console.log(res)
            if (res.data.length) {

              h += "<table class='table'><tr><th>Seal Type</th><th>Plan Date</th><th>Submission Date</th><th>Awb awb_details</th><th>Comment</th><th>Comment Date</th><th>Remarks</th></tr>"

              res.data.forEach(function (el) {
                h += `<tr><td>${el.seal_type}</td><td>${el.plan_date}</td><td>${el.submission_date}</td><td>${el.awb_details}</td><td>${el.comment}</td><td>${el.comment_date}</td><td>${el.rev_comment}</tr>`
              })
              h += "</table>"
            } else {
              h += "<h2> There is no rejections for this seal</h2>"
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
