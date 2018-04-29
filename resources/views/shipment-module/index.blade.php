@extends('layouts.apps')
@section('module-name','Shipment :: Module ')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<div class="row">
  <div class="col-12">
    <div class="row">
      &nbsp;&nbsp;&nbsp;&nbsp;<!-- <a href="" class="pull-right btn btn-success">Vessel List</i></a> -->
      <div class="col-1">
       
      </div>
      <div class="col-6"></div>
      <div class="col-4">
         
      </div>
      </div>
    </div>

        <div class="col-12">
          <div class="box">
            <div class="box-header">

              <h3 class="box-title">Shipment-Module</h3>

              <div class="box-tools" style="float:right;">
                <!-- <a href="" class="pull-right btn btn-primary">Excel<i class="fa fa-clipboard">&nbsp;</i></a> -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <thead>
                  <th>#</th>
                  <th>Proto</th>
                  <th>PO no.</th>
                  <th>Ex-Factory</th>
                  <th>Vessel</th>
                  <th>Order Qty.</th>
                  <th>Ship Qty.</th>
                  <th>Ratio/Backup</th>
                  <th>Flat/Hanging</th>
                  <th>ETA</th>
                  <th>Cost Price</th>
                  <th>Approve for Ship</th>
                </thead>
           
                <tbody>
                  @foreach($polists as $polist)
                 
                   <tr>
                  
                      <td>{{$loop->iteration}}</td>
                      @if($polist->sms_status=='complete')
                       <td width="10%" style="background-color:#66bb6a">{{$polist->proto}}</td>
                      @else
                       <td width="10%" style="background-color:#ffff00">{{$polist->proto}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td width="10%" style="background-color:#66bb6a">{{$polist->po_number}}</td>
                      @else
                       <td width="10%" style="background-color:#ffff00">{{$polist->po_number}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td style="background-color:#66bb6a">{{$polist->ex_factory_date}}</td>
                      @else
                       <td style="background-color:#ffff00">{{$polist->ex_factory_date}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                         <td style="background-color:#66bb6a">{{$polist->vessel_name}}</td>
                      @else
                        <td style="background-color:#ffff00">{{$polist->vessel_name}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td width="10%" style="background-color:#66bb6a">{{$polist->quantity}}</td>
                      @else
                       <td width="10%" style="background-color:#ffff00">{{$polist->quantity}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td style="background-color:#66bb6a">{{$polist->ship_qty}}</td>
                      @else
                       <td style="background-color:#ffff00">{{$polist->ship_qty}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                          <td style="background-color:#66bb6a">{{$polist->ratio_backup}}</td>
                      @else
                         <td style="background-color:#ffff00">{{$polist->ratio_backup}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                       <td style="background-color:#66bb6a">{{$polist->flat_hanging}}</td>
                      @else
                      <td style="background-color:#ffff00">{{$polist->flat_hanging}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td style="background-color:#66bb6a">{{$polist->ETA_UK}}</td>
                      @else
                       <td style="background-color:#ffff00">{{$polist->ETA_UK}}</td>
                      @endif
                       @if($polist->sms_status=='complete')
                        <td style="background-color:#66bb6a">{{$polist->fob_price}}</td>
                      @else
                       <td style="background-color:#ffff00">{{$polist->fob_price}}</td>
                      @endif
                 
                               <td>
                                 @if($polist->sms_status==null)
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-primary info"  data-toggle="tooltip" title="insert info!"><i class="fa fa-info"></i></a>
                                  @elseif($polist->sms_status=='complete')
                                  @else
                                   <a href="#" data-id="{{$polist->id}}" class="btn btn-success smscom"  data-toggle="tooltip" title="Approve!"><i class="fa fa-check"></i></a>
                                  @endif
                               </td>
                  
                    </tr>
                    
                    @endforeach
                </tbody>
               
               
              </table>
            @include('shipment-module.sms_modal')
            @include('shipment-module.comp_ship')
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection

@section('javascript')
  <script>
       $(document).ready(function(){
         $("#success-alert").hide();
        $('.info').click(function(){
          $('#sms_form').modal('show');
          var id=$(this).data("id");
          // console.log($(this).data("id"));
          $('.ship_id').val(id);

        });

          $('#smsbtnSave').click(function(){
          var id=$('.ship_id').val();
          var inv=$('.inv').val();
          var docdate=$('.doc_send').val();
          var authdate=$('.authdate').val();
          var paydate=$('.paydate').val();

          $( '#inv_error' ).html( "" );
          $( '#doc_error' ).html( "" );
          $( '#authdate_error' ).html( "" );
          $( '#pay_error' ).html( "" );

          $.ajax({
            url:"{{route('shipmodule.store')}}",
            type:'post',
            data:{id:id,inv:inv,docdate:docdate,authdate:authdate,paydate:paydate,'_token':"{{csrf_token()}}"},
            success:function(response){
                 console.log(response);
               if(response.errors) {
                    if(response.errors.inv){
                        $( '#inv_error' ).html( response.errors.inv[0] );
                    }
                    if(response.errors.docdate){
                        $( '#doc_error' ).html( response.errors.docdate[0] );
                    }
                    if(response.errors.authdate){
                        $( '#authdate_error' ).html( response.errors.authdate[0] );
                    }

                    if(response.errors.paydate){
                        $( '#pay_error' ).html( response.errors.paydate[0] );
                    }
                    
                }

                 if(response.success) {
            
                   $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){

                   $("#success-alert").slideUp(500);
                   $('#sms_form').modal('hide');
                   location.reload();
                }); 
                        $( '#inv_error' ).val( "" );
                        $( '#doc_error' ).val( "" );
                        $( '#authdate_error' ).val( "" );
                        $( '#pay_error' ).val( "" );

                       location.reload();
                }
            },
          });


         
        });


            $('.smscom').click(function(){
              $('#cps_form').modal('show');
              $('.ship_id').val($(this).data("id"));
          });

        $('#cpshipbtnSave').click(function(){
           var id=$('.ship_id').val();
           $( '#id_error' ).html( "" );


          $.ajax({
            url:"{{route('shipmodule.complete')}}",
            type:'post',
            data:{id:id,'_token':"{{csrf_token()}}"},
            success:function(response){
                 console.log(response);
               if(response.errors) {
                    if(response.errors.id){
                        $( '#id_error' ).html( response.errors.id[0] );
                    }
                  
                    
                }

                 if(response.success) {
            
            
                   $('#cps_form').modal('hide');
                   location.reload();
             
                        $( '#id_error' ).val( "" );
                      
                       location.reload();
                }
            },
          });


        });

         //============= DatePicker-Part ====================//
          $('.doc_send').datepicker({
            format:'yyyy-mm-dd',
            // format:'dd M yy', //show 25 Apr 18.
            //startDate:'today',
            autoclose: true,
          });

           $('.authdate').datepicker({
            format:'yyyy-mm-dd',
            // format:'dd M yy', //show 25 Apr 18.
            //startDate:'today',
            autoclose: true,
          });

             $('.paydate').datepicker({
            format:'yyyy-mm-dd',
            // format:'dd M yy', //show 25 Apr 18.
            //startDate:'today',
            autoclose: true,
          });
       });

    </script>

@endsection