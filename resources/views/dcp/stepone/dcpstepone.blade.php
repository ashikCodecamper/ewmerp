@extends('layouts.apps')
@section('module-name','Development Critical Path')
@section('stylesheet')
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
@endsection
@section('content')
    <div class="row">
     <div class="col-md-12">
      <div class="box">
        <div class="box-header">
           <h3 class="box-title">Proto Information</h3>

              <div class="box-tools" style="float:right;">
                  <a href="{{route('dcpsteponeindex')}}"><button type="buton" class="btn bg-purple btn-lg" ><strong>Proto List<strong></button></a>
              </div>
              <hr>

@if ($errors->any())
    <div class="alert alert-danger" id="errmsg">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        </div>

      <form class="" method="post" action="{{route('dcpstepone')}}" enctype="multipart/form-data" data-parsley-validate>
        {{csrf_field()}}
        <div class="row">
          <div class="col-md-3">
        <div class="form-group">
             <label>Sourcing Number</label>
                <input type="text" name="sl_no" class="form-control" value="{{$code.''.$dcpstepcode}}" readonly>
           </div>

        </div>
        </div>

        <div class="row">
       <div class="col-md-2">
        <div class="form-group">
           <label>Select Season</label>
         <select class="form-control" name="seasn" required="" data-parsley-error-message="Select a Season.">
           <option value="">-Select Season-</option>
           @if(!empty($seasons))
            @foreach($seasons as $s)
            <option value="{{$s->id}}" {{old('seasn')==$s->id ? 'selected':''}}>{{$s->sea_name}}</option>
            @endforeach
           @endif
         </select>
        </div>

       </div>
        <div class="col-md-2">
        <div class="form-group">
           <label>Select Brand</label>
         <select class="form-control" name="brand" required="" data-parsley-error-message="Select a Brand.">
           <option value="">-Select Brand-</option>
           @if(!empty($brands))
            @foreach($brands as $b)
            <option value="{{$b->id}}" {{old('brand')==$b->id ? 'selected':''}}>{{$b->brand_name}}</option>
            @endforeach
           @endif
         </select>
        </div>

       </div>
        <div class="col-md-2">
        <div class="form-group">
           <label>Select Label</label>
         <select class="form-control" name="lvl" required="" data-parsley-error-message="Select a Label.">
          <option value="">-Select Label-</option>
            @if(!empty($labels))
              @foreach($labels as $label)
           <option value="{{$label->id}}" {{old('lvl')==$label->id ? 'selected':''}}>{{$label->label_name}}</option>
              @endforeach
            @endif
         </select>
        </div>

       </div>
       <div class="col-md-2">
        <div class="form-group">
           <label>Product Categories</label>
         <select class="form-control" name="prdct" required="" id="prdct" data-parsley-error-message="Select a Category." >
           <option value="">-Select Categories-</option>
            @if(!empty($pcats))
              @foreach($pcats as $p)
           <option value="{{$p->id}}">{{$p->name}}</option>
              @endforeach
            @endif
         </select>
        </div>

       </div>
       <div class="col-md-2">
         <div class="form-group">
           <label>Proto/Style Ref.</label>
           <input type="text" name="proto" id="protono" class="form-control" required="" data-parsley-error-message="Enter proto/style ref.">
           <p id="errmsg1" style="color:red"></p>
         </div>
       </div>
        <div class="col-md-2">
         <div class="form-group">
           <label>Proto Recieve. Date</label>
           <input type="text" name="prdate" class="form-control" id="date-picker">
         </div>
       </div>
        </div>
         <hr>
        <div class="row">

         <div class="col-md-4" style="display: none;" id="knit">
          <div class="form-group">
             <label>Garments Weight</label>
           <div class="input-group">
             <input type="text" name="garmntsweight" class="form-control" data-parsley-error-message="Enter Weight only digit.">
            <span class="input-group-addon"><b>lbs/dz</b></span>
            </div>
          </div>
        </div>
         <div class="col-md-2" style="display: none;" id="plbs">
          <div class="form-group">
             <label>Yarn Price</label>
           <div class="input-group">
             <input type="text" name="knitprice" class="form-control" id="pricelbs">
            <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            </div>
          </div>
        </div>


        <!-- <div class="col-md-2" style="display: none" id="weightkg">
          <div class="form-group">
             <label>Weight (kg)</label>
          <input type="text" name="weightkg" class="form-control" data-parsley-error-message="Enter Weight(kg)." id="weightkg">
          </div>
        </div> -->
         <div class="col-md-2" style="display: none" id="febconstruct">
          <div class="form-group">
             <label>Fabric Construction</label>
          <input type="text" name="fabconst" class="form-control" data-parsley-error-message="Enter Fabric Construction." id="fabconst">
          </div>
        </div>
         <div class="col-md-2" style="display: none;" id="cwidth">
          <div class="form-group">
             <label>Cutable Width</label>
            <div class="input-group">
             <input type="text" name="cutwidth" class="form-control" data-parsley-error-message="Enter Cutable Width." id="cutwidth">
            <span class="input-group-addon"><b>Inch</b></span>
            </div>
          </div>

        </div>
        <div class="col-md-2" style="display: none;" id="fweight">
           <div class="form-group">
             <label>Fabric Weight</label>
           <div class="input-group">
               <input type="text" name="fabweight" class="form-control" data-parsley-error-message="Enter Fabric Weight." id="fab">
            <span class="input-group-addon"><b>Gsm</b></span>
            </div>
          </div>
        </div>
        <div class="col-md-2" style="display: none;" id="febprice">
          <div class="form-group">
             <label>Fabric Price</label>
             <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-usd"></i></span>
            <input id="fabprice" type="text" class="form-control" name="fabprice" placeholder="Price">
            </div>

          </div>
        </div>
        <div class="col-md-2" style="display: none" id="weightlbs">
          <div class="form-group">
             <label>Price Prefix</label>
         <select class="form-control" id="pricepfx" name="pricepfx">
          <option value="">-Select Prefix-</option>
          <option value="yard">Yard</option>
          <option value="kg">Kg</option>
          <option value="lbs">lbs</option>
         </select>
          </div>
        </div>

        </div>
        <hr>

        <div class="row">
         <div class="col-md-2">
          <div class="form-group">
           <label>Sourcing Type</label>
            <select name="srctype" class="form-control" required="" data-parsley-error-message="Select a Source">
              <option value="">-Select Source-</option>
              <option value="local" {{old('srctype')=="local" ? 'selected':''}}>Local</option>
              <option value="imported" {{old('srctype')=="imported" ? 'selected':''}}>Imported</option>

            </select>
         </div>
        </div>

         <div class="col-md-2">
         <div class="form-group">
           <label>Colour Name</label>
           <input type="text" name="clrname" class="form-control" required="" data-parsley-error-message="Enter Color Name">
         </div>
       </div>
        <div class="col-md-2">
         <div class="form-group">
           <label>Style.</label>
           <input type="text" name="style_code" class="form-control" required="" data-parsley-error-message="Enter Style.">
         </div>
       </div>
        <div class="col-md-2">
         <div class="form-group">
           <label>Yarn/Febric Composition.</label>
          <textarea rows="1" class="form-control" name="yarn" required="" data-parsley-error-message="Enter Composition yarn/fabrice"></textarea>
         </div>
       </div>
       <div class="col-md-2">
         <div class="form-group">
           <label>Product Description.</label>
          <textarea rows="1" class="form-control" name="pdes" required="" data-parsley-error-message="Enter Product Description"></textarea>
         </div>
       </div>
        <div class="col-md-5">
         <div class="form-group">
           <label for="Protofile">Upload Proto/style.</label>
          <input type="file" name="img" class="form-control">
         </div>
       </div>
        </div>
        <div class="row"></div>
        <div class="row"></div>
<div class="row"><div class="col-md-2"><input type="submit" name="" class="btn btn-success" value="Save"></div></div>
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

<script type="text/javascript">
  $(document).ready(function(){
    $('#prdct').change(function(){
        var prdctype=$(this).val();

        if (prdctype !='')
        {
          $.ajax({
            url:"{{route('dcpgetinfo')}}",
            method:'post',
            data:{id:prdctype,'_token':"{{csrf_token()}}"},
            success:function(response)
            {
              var value=response[0].type;
              console.log(value);
              if (value==value.match(/leisurewear/i))
              {

                $('#cwidth').css("display","");
                $('#fweight').css("display","");
                $('#febprice').css("display","");
                $('#weightlbs').css("display","");
                $("#pricepfx").val('kg').trigger('change');
                $('#weightkg').css("display","none");
                $('#knit').css("display","none");
                $('#plbs').css("display","none");
                $('#febconstruct').css("display","none");


              }
              else if (value==value.match(/woven/i))
              {

                $('#febconstruct').css("display","");
                $('#cwidth').css("display","");
                $('#fweight').css("display","");
                $('#febprice').css("display","");
                $('#weightlbs').css("display","");
                $("#pricepfx").val('yard').trigger('change');
                $('#weightkg').css("display","none");
                $('#knit').css("display","none");
                $('#plbs').css("display","none");



              }
              else if (value==value.match(/knitwear/i))
              {

                $('#febconstruct').css("display","none");
                $('#cwidth').css("display","none");
                $('#fweight').css("display","none");
                $('#febprice').css("display","none");
                $('#weightlbs').css("display","");
                  $("#pricepfx").val('lbs').trigger('change');
                $('#weightkg').css("display","none");
                $('#knit').css("display","");
                $('#plbs').css("display","");
              }

            }
          });
        }
        else
        {
                $('#febconstruct').css("display","none");
                $('#cwidth').css("display","none");
                $('#fweight').css("display","none");
                $('#febprice').css("display","none");
                $('#weightlbs').css("display","none");
                $('#weightkg').css("display","none");
                $('#knit').css("display","none");
                $('#plbs').css("display","none");


        }

    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){

    $('#errmsg').fadeIn().delay(10000).fadeOut();
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#protono').focusout(function(){
      var proto=$(this).val();
      $.ajax({
        url:"{{route('proto.unique')}}",
        method:'post',
        data:{protono:proto,'_token':"{{csrf_token()}}"},
        success:function(response)
        {
          if(response=='true')
          {
            $('#errmsg1').html('already Registered').delay(5000).fadeOut("slow");
          }
        }
      });
    });
  });
</script>
@endsection
