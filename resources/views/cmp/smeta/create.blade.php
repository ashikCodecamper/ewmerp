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
           <h3 class="box-title">Smeta Registration for {{$s->name}}</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('cmpHome')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>compliance list<strong></button></a>
              </div>
              <hr>
        </div>
      
      <form class="" method="post" action="{{route('smetaStore',$s->id)}}" enctype="multipart/form-data" data-parsley-validate>
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-3">

                <div class="form-group">
                    <label>Smeta ZS Number</label>
                    <input type="text" required  name="smeta_zs" class="form-control" value="">
                </div>
            </div>
            <div class="col-md-3">

                    <div class="form-group">
                        <label>Smeta ZC Number</label>
                        <input type="text" required  name="smeta_zc" class="form-control" value="">
                    </div>
            </div>
            <div class="col-md-3">

                    <div class="form-group">
                        <label>Expiry Date</label>
                        <input type="text" name="smeta_expiry" class="form-control" id="date-picker" value="">
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
  $('#date-picker').daterangepicker({locale: {
      format: 'YYYY-MM-DD',
    startView: "years",
    }, singleDatePicker: true, "showDropdowns": true, }, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
  });
});

</script>
@endsection
