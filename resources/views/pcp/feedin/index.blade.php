@extends('layouts.apps')
@section('module-name','Production Critical Path')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

<link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection

@section('content')
<div class="row">
 <div>
   <h3></h3>
 </div>
 <div class="col-12">
   <div class="box">
        <div class="box-header">
          <h3 class="box-title">Feed In Date Target</h3>

          <div class="box-tools" style="float:right;">
              <a href="{{route('feedin.create')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>create<strong></button></a>
          </div>
          <hr>
        </div>
        <div class="box-body no-padding">
          <table class="table">
            <tr>
              <th>#</th>
              <th>Proto</th>
              <th>Target Date</th>
              <th>Actual submission date</td>
              <th class="text-right">Action</th>
            </tr>

            @foreach($sealones as $sealone)
            <tr>
              <td>{{$loop->index += 1}}</td>
              <td>{{$sealone->dcpone->proto}}</td>
              <td>{{$sealone->feed_in_target}}</td>
              <td>{{$sealone->act_feed_date}}</td>
              <td class="text-right">
                  <a href="{{route('feedin.edit', ['id'=>$sealone->id])}}"><span class="btn label-warning">edit</span></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>


 </div>
</div>
</div>
@endsection
@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#date-picker').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

   $('#date-picker1').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });

     $('#actu').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });


  });
</script>

<script type="text/javascript">
    $(document).ready(function()
    {
      $('#plandate').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true
      });

       $('#cmntsdate').bootstrapMaterialDatePicker
      ({
        time: false,
        clearButton: true
      });

      $.material.init()
    });
</script>

<script type="text/javascript">
      $(document).ready(function(){
        var exfactory_date, approval_date, remaining_days, submitted_date;
        console.log($("#actsubdate"));
        $("#actsubdate").change(function() {
            $.ajax({
              url: "{{route('seal01.exfactory')}}",
              data: {
                id: $("#actsubdate").val()

              },
              success: function(result){
                console.log(result)
                var result = JSON.parse(result);

                exfactory_date = moment(result.exfactory);

                console.log('proto receive date = > ', result.rcv_date);

                console.log("exfactory date => ", exfactory_date.format('YYYY-MM-DD'));


                approval_date = exfactory_date.subtract(28, 'days');
                $("#target").val(approval_date.format('YYYY-MM-DD'))
                console.log("approval date(exfactory_date- 28) => ", approval_date.format('YYYY-MM-DD'));
              }
            });
      });
      $('#actu').change(function () {
        submitted_date = $("#actu").val();
        remaining_days = approval_date.diff(submitted_date, 'days');
        console.log('remaining_days(approval date - exfactory date => ', remaining_days);

        // var rem_text = remaining_days >= 0 ? `Remaingin days of exfactory - ${remaining_days}` :`overdays of exfactory${remaining_days}`
        //
        // $('#remaining').text(rem_text);


        if (remaining_days >= 0) {
          $("#actu").css("background-color", "#43a047 green darken-1");
          $("#actu").css("background-color", '#43a047 green darken-1');
        } else if (remaining_days < 0 && remaining_days >= -5) {
          $("#actu").css("background-color", "#ffff00 yellow accent-2");
          $("#actu").css("background-color", '#ffff00 yellow accent-2');
        } else if (remaining_days < -5) {
          $("#actu").css("background-color", "#ff7043 deep-orange lighten-1");
          $("#actu").css("background-color", '#ff7043 deep-orange lighten-1');
        }
      });

    });
    </script>




@endsection
