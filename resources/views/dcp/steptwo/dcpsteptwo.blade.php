@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
     <div class="col-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">DCP Price Matrix</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('dcpsteptwolist')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Price Matrix List<strong></button></a>
              </div>
              <hr>
            </div>
            <form method="post" action="{{route('dcpsteptwo')}}" data-parsley-validate>
              {{csrf_field()}}
        <div class="row">
        <div class="col-md-2">
          <div class="form-group">
             <label>Select Proto No.</label>
           <select class="form-control" name="srcno" id="srcno" required="" data-parsley-error-message="Select Proto no.">
             <option value="">-Select Proto -</option>
             @if(!empty($srcno))
              @foreach($srcno as $n)
              <option value="{{$n->id}}">{{$n->proto}}</option>
              @endforeach
             @endif
           </select>
           <span class="text-danger"></span>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group">
            <label>FOB Price</label>
            <input type="text" name="fobprice" class="form-control" required="" data-parsley-error-message="Enter FOB Price" placeholder="FOB Price">
          </div>
          
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Target Price</label>
            <input type="text" name="targetprice" class="form-control" required="" placeholder="Target Price" data-parsley-error-message="Enter Target Price">
          </div>
          
        </div>
      

       <div class="col-md-2" id="supplier">
          <div class="form-group">
             <label>Supplier</label>
         <select class="form-control" name="suppliername" required="" data-parsley-error-message="Select Supplier Name">
          <option value="">-Select supplier-</option>
          @foreach($supplier as $sup)
          <option value="{{$sup->id}}">{{$sup->supplier_name}}</option>
           @endforeach
         </select>
          </div>
        </div>

        <div class="col-md-2" id="yarn&febric">
          <div class="form-group">
             <label>Yarn / Fabric Supplier</label>
           
<input id="supplier" type="text" class="form-control" name="supplier" placeholder="Supplier Name" required="" data-parsley-error-message="Enter Yarn/Fabrice Supplier">
          
          </div>
        </div>
     
       </div>
             <div class="row" id="courier">
       
            <div class="col-md-6">
             <fieldset>
          <legend>Courier Information</legend>
           <div class="row">
             <div class="col-md-6">
               <div class="form-group">
             <label>Select Courier</label>
             <select class="form-control" name="courier" required="" data-parsley-error-message="Select Courier Name">
               <option value="">-Select Courier-</option>
               @foreach($cour_no as $c)
               <option value="{{$c->id}}">{{$c->courier_name}}</option>
               @endforeach
               
             </select>
           </div>
             </div>
           </div>
           <table class="table table-bordered">
             <thead>
               <th>Date of Submission</th>
               <th>Parcel Tracking Number</th>
               <th>UK Arrival Date</th>
             </thead>
             <tbody>
            <td><input type="text" name="sub_date" id="sudate" class="form-control" placeholder="mm/dd/yyyy"></td>
            <td rowspan="2"><input type="text" name="trackno" class="form-control" required="" data-parsley-error-message="Enter Parcel Tracking no." placeholder="Parcel Tracking No."></td>
            <td><input type="text" name="arrivedate" id="ukardate" class="form-control" placeholder="mm/dd/yyyy"></td>
             </tbody>
           </table>
             </fieldset> 
         </div>
        
       </div>

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
    $('#ukardate').daterangepicker({locale: {
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

@endsection
