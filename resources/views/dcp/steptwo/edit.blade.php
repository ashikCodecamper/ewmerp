@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
     <div>
       <h3>Step-2 Update</h3>
     </div>
     <div class="col-12">
       <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update DCP Step-Two</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('dcpsteptwolist')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>DCP-S02 List<strong></button></a>
              </div>
              <hr>
            </div>
            <form method="post" action="{{route('dcpsteptwoupdate',$dcptwo->id)}}" data-parsley-validate>
              {{csrf_field()}}
              <input type="hidden" name="_method" value="PUT">
        <div class="row">
        <div class="col-md-2">
          <div class="form-group {{$errors->has('srcno') ? 'has-error' : ''}}">
             <label>Select Proto No.</label>
           <select class="form-control" name="srcno" id="srcno" required="">
             <option value="">-Select Proto -</option>
             @if(!empty($srcno))
              @foreach($srcno as $n)
    <option value="{{$n->id}}"{{$dcptwo->source_id==$n->id ? 'selected' : ''}}>{{$n->proto}}</option>
              @endforeach
             @endif
           </select>
           <span class="text-danger">{{ $errors->first('srcno') }}</span>
          </div>
        </div>

        <div class="col-md-2">
          <div class="form-group {{$errors->has('fobprice') ? 'has-error' : ''}}">
            <label>FOB Price</label>
            <input type="text" name="fobprice" class="form-control" required="" value="{{$dcptwo->fob_price}}">
            <span class="text-danger">{{ $errors->first('fobprice') }}</span>
          </div>
          
        </div>
        <div class="col-md-2">
          <div class="form-group {{$errors->has('tarprice') ? 'has-error' : ''}}">
            <label>Target Price</label>
            <input type="text" name="tarprice" class="form-control" required="" placeholder="Target Price" value="{{$dcptwo->target_price}}">
             <span class="text-danger">{{$errors->first('tarprice')}}</span>
          </div>
          
        </div>

         <div class="col-md-2" id="supplier">
          <div class="form-group">
             <label>Supplier</label>
         <select class="form-control" name="suppliername" required="" data-parsley-error-message="Select Supplier Name">
          <option value="">-Select supplier-</option>
          @foreach($supplier as $sup)
          <option value="{{$sup->id}}"{{$dcptwo->supplier_id==$sup->id ? 'selected': ''}}>{{$sup->supplier_name}}</option>
           @endforeach
         </select>
          </div>
        </div>
      
        <div class="col-md-2" id="yarn&febric">
          <div class="form-group">
             <label>Yarn / Febrice Supplier</label>
           
<input id="supplier" type="text" class="form-control" name="supplier" placeholder="Supplier Name" required="" value="{{$dcptwo->sup_name}}">
          
          </div>
        </div>
     
       </div>
             <div class="row" id="courier">
       
            <div class="col-md-6">
             <fieldset>
          <legend>Courier Information</legend>
           <div class="row">
             <div class="col-md-6">
               <div class="form-group {{$errors->has('courier') ? 'has-error' : ''}}">
             <label>Select Courier</label>
             <select class="form-control" name="courier" required="">
               <option value="">-Select Courier-</option>
               @foreach($cour_no as $c)
               <option value="{{$c->id}}" {{$dcptwo->courier_no==$c->id ? 'selected' : ''}}>{{$c->courier_name}}</option>
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
            <td class="{{$errors->has('sub_date') ? 'has-error' : ''}}"><input type="text" name="sub_date" id="sudate" class="form-control" placeholder="mm/dd/yyyy" alue="{{$dcptwo->submission_date}}"></td>
            <td><input type="text" name="trackno" class="form-control" required="" value="{{$dcptwo->prcl_track_no}}"></td>
            <td><input type="text" name="arrivedate" id="ukardate" class="form-control" placeholder="mm/dd/yyyy" value="{{$dcptwo->uk_arrival}}"></td>
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
