@extends('layouts.apps')
@section('module-name','Compliance')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
     <div class="col-md-12">
      <div class="box">
        
        <div class="box-header">
           <h3 class="box-title">Current Appliance for {{$s->name}}</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('cmpHome')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>compliance list<strong></button></a>
              </div>
              <hr>
        </div>
      
      <form class="" method="post" action="{{route('approval.save',['id'=>$s->id])}}" enctype="multipart/form-data" data-parsley-validate>
        {{csrf_field()}}
        <div class="row">

            <div class="col-md-3">
                <div class="form-group">
                    <label>sedex audit date</label>
                    <input type="text" name="sedex_auditdate" class="form-control" value="" id="date-picker1">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>sedex expiry date</label>
                    <input type="text" name="sedex_expirydate" class="form-control" value="" id="date-picker2">
                </div>
            </div>


            <div class="col-md-3">
                <div class="form-group">
                    <label>Bsci audit date</label>
                    <input type="text" name="bsci_auditdate" class="form-control" value="" id="date-picker3">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Bsci expiry date</label>
                    <input type="text" name="bsci_expirydate" class="form-control" value="" id="date-picker4">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Wrap audit date</label>
                    <input type="text" name="wrap_auditdate" class="form-control" value="" id="date-picker5">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>Wrap expiry date</label>
                    <input type="text" name="wrap_expirydate" class="form-control" value="" id="date-picker6">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label>ICS/WCA audit date</label>
                    <input type="text" name="ics_auditdate" class="form-control" value="" id="date-picker7">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>ICS/WCA expiry date</label>
                    <input type="text" name="ics_expirydate" class="form-control" value="" id="date-picker8">
                </div>
            </div>

        </div>
       
        </div>
        <div class="row"><div class="col-md-4"><input type="submit" name="" class="btn btn-success" value="Save"></div></div>

        
    </form>
    </div>
    </div>
    </div>
@endsection

@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script type="text/javascript">
  
  $(document).ready(function() {
    $('#date-picker3').daterangepicker({locale: {
        format: 'YYYY-MM-DD',
        startView: "years",
        }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });
    $('#date-picker1').daterangepicker({locale: {
        format: 'YYYY-MM-DD',
    startView: "years",
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);   
    });
    $('#date-picker2').daterangepicker({locale: {
        format: 'YYYY-MM-DD',
      startView: "years",
      }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
      $('#date-picker4').daterangepicker({locale: {
              format: 'YYYY-MM-DD',
              startView: "years",
          }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#date-picker5').daterangepicker({locale: {
              format: 'YYYY-MM-DD',
              startView: "years",
          }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#date-picker6').daterangepicker({locale: {
              format: 'YYYY-MM-DD',
              startView: "years",
          }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#date-picker7').daterangepicker({locale: {
              format: 'YYYY-MM-DD',
              startView: "years",
          }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
      });
      $('#date-picker8').daterangepicker({locale: {
              format: 'YYYY-MM-DD',
              startView: "years",
          }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
      });
});

</script>
@endsection
