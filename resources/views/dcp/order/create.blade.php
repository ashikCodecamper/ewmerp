@extends('layouts.apps')
@section('module-name','Order Receive')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
     <div>
       <h3></h3>
     </div>
     <div class="col-12">
     	 <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('orderprocess.index')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Order Receive List<strong></button></a>
              </div>
              <hr>
            </div>
            <form method="post" action="{{route('orderprocess.store')}}" data-parsley-validate>
              {{csrf_field()}}
              <div class="row">
                <div class="col-md-3">
                <div class="form-group">
                   <label>BD/PO Sheet Receiving Date</label>
                <input type="text" name="porcvdate" value="" class="form-control" id="porcv">
                  <span class="text-danger"></span>
                </div>
               </div>
               <div class="col-md-2">
               <div class="form-group">
                  <label>Proto No.</label>
               <select class="form-control" name="srcno" required data-parsley-error-message="Select Source No.">
                 <option value="">-Select Proto-</option>
                 @foreach ($srcno as $src)
                 <option value="{{$src->source_id}}">{{$src->proto}}</option>
                 @endforeach
               </select>
                 <span class="text-danger"></span>
               </div>
              </div>

               <div class="col-md-2">

               </div>
               <div class="col-md-5">
                 <a href="#" class="btn btn-success add">ADD</a>&nbsp;
                 <a href="#" class="btn btn-warning remove">Remove</a>
               </div>
              </div>
<!--Bulk KnitDown Dynamic Part -->
          <div id="bul_container">
             <div id="bulk">
             <div class="row">
                 <div class="col-md-3">
                   <div class="form-group">
                     <label>Color</label>
                     <input type="text" name="color[]" class="form-control" required data-parsley-error-message="Enter Color Name or Code">
                   </div>

                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <label>Quantity</label>
                     <input type="text" name="qty[]" class="form-control" required data-parsley-error-message="Enter Quantity">
                   </div>
                 </div>

                 <div class="col-md-3">
                   <div class="form-group">
                      <label>Ex-Factory Date</label>
                     <input type="text" class="form-control exfact" name="exfactdate[]" placeholder="" required data-parsley-error-message="Select Date">
                   </div>
                 </div>
                 <div class="col-md-3">
                   <div class="form-group">
                     <label for="">Warehouse Date</label>
                     <input type="text" name="warehouse[]" value="" class="form-control warehouse" readonly>
                   </div>
                 </div>
                </div>
                </div>
          </div>
<!-- END Bulk KnitDown Dynamic Part -->


       <div class="row"></div>
       <div class="row">

       		<div class="col-md-2">
       			<input type="submit" name="submit" class="btn btn-info" value="SAVE">
       		</div>
       </div>
       </form>
     </div>
    </div>
@endsection
@section('javascript')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
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
    $('#porcv').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
     $('#sudate').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });


  });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    var bulknitdown="<div class='row'>"+$('#bulk .row').first().html()+"</div>";
    $('.add').click(function(){

            $('#bulk').append(bulknitdown);
            $('#bulk .row').last();

    });
    $('.remove').click(function(){
      if($('#bulk .row').length>1){
        $('#bulk .row').last().remove();
      }
      else{
       alert("You can't Remove this Row");
      }
    });


    //Date for Ex-Factory.
    $('#bulk').on('focusin',".exfact",function(){
      $(this).daterangepicker({locale: {
        format: 'YYYY-MM-DD',
      }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
      console.log(start.toISOString(), end.toISOString(), label);
    });
    });

    $('#bulk').on('focusout',".exfact",function(){
         var date=$(this).val();
         var parent=$(this).closest('.row');

           var w=moment(date).add(42, 'days').format('Y-M-D');
            parent.find('.warehouse').val(w);
    });
  });
</script>

@endsection
