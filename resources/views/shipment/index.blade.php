@extends('layouts.apps')
@section('module-name','Pending :: Shipment ')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<div class="row">
  <div class="col-12">
    <div class="row">
      &nbsp;&nbsp;&nbsp;&nbsp;<a href="{{route('vessel.approval')}}" class="pull-right btn btn-success">Vessel List</i></a>
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

              <h3 class="box-title">Shipment</h3>

              <div class="box-tools" style="float:right;">
                <a href="{{route('vessel.list')}}" class="pull-right btn btn-primary">Excel<i class="fa fa-clipboard">&nbsp;</i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <thead>
                  <th>#</th>
                  <th>Supplier</th>
                  <th>Proto</th>
                  <th>Style no.</th>
                  <th>Description</th>
                  <th>PO Qty.</th>
                  <th>Season</th>
                  
                  <th>Color</th>
                  <th>Ex-Factory</th>
                  <th>Add Vessel Info</th>
                </thead>
           
                <tbody>
                  @foreach($polists as $polist)
                 
                   <tr>
                      <td>{{$loop->iteration}}</td>
                      
                       <td width="15%">{{$polist->supplier_name}}</td>
                       <td>{{$polist->proto}}</td>
                        <td>{{$polist->style_code}}</td>
                         <td width="15%">{{$polist->prdct_des}}</td>
                          <td>{{$polist->quantity}}</td>
                           <td>{{$polist->sea_name}}</td>
                           
                             <td>{{$polist->color}}</td>
                              <td>{{$polist->ex_factory_date}}</td>
                               <td>
                                 <a href="#" data-id="{{$polist->id}}" class="btn btn-danger rvlist" data-toggle="tooltip" title="Log!"><i class="fa fa-plus"></i></a>
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-warning smodal"  data-toggle="tooltip" title="Revise!"><i class="fa fa-reply"></i></a>
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-primary approve"  data-toggle="tooltip" title="insert info!"><i class="fa fa-info"></i></a>
                                  <!-- <a href="#" data-id="{{$polist->id}}" class="btn btn-success vesselapprove"  data-toggle="tooltip" title="Approve!"><i class="fa fa-check"></i></a> -->
                               </td>
                     
                     <!--  <td width="15%">{{$polist->supplier_name}}</td>
                      <td>{{$polist->proto}}</td>
                        <td>{{$polist->style_code}}</td>
                         <td width="15%">{{$polist->prdct_des}}</td>
                          <td>{{$polist->quantity}}</td>
                           <td>{{$polist->sea_name}}</td>
                           
                             <td>{{$polist->color}}</td>
                              <td>{{$polist->ex_factory_date}}</td>
                               <td>
                                 <a href="#" data-id="{{$polist->id}}" class="btn btn-danger rvlist" data-toggle="tooltip" title="View!"><i class="fa fa-plus"></i></a>
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-warning smodal"  data-toggle="tooltip" title="Revise!"><i class="fa fa-reply"></i></a>
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-primary approve"  data-toggle="tooltip" title="insert info!"><i class="fa fa-info"></i></a>
                                  <a href="#" data-id="{{$polist->id}}" class="btn btn-success vesselapprove"  data-toggle="tooltip" title="Approve!"><i class="fa fa-check"></i></a>
                               </td> -->
                     
                       
                           
                    </tr>
                    
                    @endforeach
                </tbody>
               
               
              </table>
              @include('shipment.modal')
               @include('shipment.show')
                @include('shipment.revised')
                 @include('shipment.approve')
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
         $('[data-toggle="tooltip"]').tooltip(); 
        //======load data in modal========//
          $('.smodal').click(function(){
            $('#show_form').modal('show');
            
             $( '#exfact_error' ).html( "" );
             $( '#oexfact_error' ).html( "" );
             $( '#comments_error' ).html( "" );
              var id=$(this).data("id");
              $.ajax({
                url:"{{route('shipment.exfact')}}",
                type:'post',
                data:{id:id,'_token':"{{csrf_token()}}"},
                success:function(data){
                  $('.ord_id').val(data[0].id);
                  $('.exfact').val(data[0].ex_factory_date);
                },
              });
           
          });

        //============validate re-vised exfactory date modal============//
        $('#rvex_btnSave').click(function(){
          var id=$('.ord_id').val();
          var oexfact=$('.exfact').val();
          var revexfact=$('.rv_exfact').val();
          var comment=$('.comments').val();

          $( '#exfact_error' ).html( "" );
          $( '#oexfact_error' ).html( "" );
          $( '#comments_error' ).html( "" );

          $.ajax({
            url:"{{route('shipment.exfact.store')}}",
            type:'post',
            data:{id:id,oexfact:oexfact,revexfact:revexfact,comment:comment,'_token':"{{csrf_token()}}"},
            success:function(response){
               if(response.errors) {
                    if(response.errors.revexfact){
                        $( '#exfact_error' ).html( response.errors.revexfact[0] );
                    }
                    if(response.errors.oexfact){
                        $( '#oexfact_error' ).html( response.errors.oexfact[0] );
                    }
                    if(response.errors.comment){
                        $( '#comments_error' ).html( response.errors.comment[0] );
                    }
                    
                }

                 if(response.success) {
            
                   $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){

                   $("#success-alert").slideUp(500);
                   $('#show_form').modal('hide');
                   location.reload();
                }); 
                       $( '.exfact' ).val( "" );
                       $( '.rv_exfact' ).val( "" );
                       $( '.comments' ).val( "" );

                       //console.log(response.data);
                }
            },
          });
         
        });
      //========<End>=========//

      //========<Start Vessel Information>=========//


          $('.approve').click(function(){
             $("#success-alert-vessel").hide();
            $('#modal_form').modal('show');
              const id=$(this).data("id");
              $('.ord_id').val(id);
               $( '#ship_error' ).html( "" );$( '#ratiobackup_error' ).html( "" );$( '#flat_error' ).html( "" );$( '#eta_error' ).html( "" );$('#vessel_error').html("");
          });
        $('#vinfobtnSave').click(function(){
          var id=$('.ord_id').val();var shipqty=$('.shipqty').val();var ratio=$('.ratiobackup').val();
          var flat=$('.flat') .val();var eta=$('.eta').val();var vessel=$('.vessel').val();
           $( '#ship_error' ).html( "" );$( '#ratiobackup_error' ).html( "" );$( '#flat_error' ).html( "" );$( '#eta_error' ).html( "" );$('#vessel_error').html("");
          $.ajax({
            url:"{{route('shipment.vesselinfo.store')}}",
            type:'post',
            data:{id:id,shipqty:shipqty,ratio:ratio,flat:flat,eta:eta,vessel:vessel,'_token':"{{csrf_token()}}"},
            success:function(response){
                   if(response.errors) {
                    if(response.errors.shipqty){
                        $( '#vessel_error' ).html( response.errors.vessel[0] );
                    }
                    if(response.errors.shipqty){
                        $( '#ship_error' ).html( response.errors.shipqty[0] );
                    }
                    if(response.errors.ratio){
                        $( '#ratiobackup_error' ).html( response.errors.ratio[0] );
                    }
                    if(response.errors.flat){
                        $( '#flat_error' ).html( response.errors.flat[0] );
                    }
                    if(response.errors.eta){
                        $( '#eta_error' ).html( response.errors.eta[0] );
                    }
                    
                }
                if(response.success) {
            
                   $("#success-alert-vessel").fadeTo(2000, 500).slideUp(500, function(){

                   $("#success-alert-vessel").slideUp(500);
                   $('#modal_form').modal('hide');
                    }); 

                       $( '.shipqty' ).val( "" );
                       $( '.ratiobackup' ).val( "" );
                       $( '.flat' ).val( "" );
                       $( '.eta' ).val( "" );
                       $( '.vessel' ).val( "" );
                       console.log(response.data);
                }
            }
          });

        });

      //========<End>=========//

      //=============revised list==============//
      $('.rvlist').click(function(){
        var id=$(this).data("id");
        $.ajax({
          url:"{{route('shipment.revised_exfactory')}}",
          type:'post',
          data:{id:id,'_token':"{{csrf_token()}}"},
          success:function(data){
            $('#revised_list').modal('show');
             var html = ''; //initialize your html
             for(i=0;i<data.length;i++) //loop depends on the length of response
             {
                html+= //concatinate the html data in this variable
                  '<tr>'+
                      '<td>'+(1+i)+'</td>'+
                      '<td>'+data[i].previous_exfactory+'</td>'+
                      '<td>'+data[i].new_exfactory+'</td>'+
                      '<td>'+data[i].change_reason+'</td>'+
                  '</tr>';
             }
             $('#tBody').html(html); //pass the html data to your body
                console.log(data);
          }
        });
        
      });

    //================= Vessel Approve part ==========================//
    $('.vesselapprove').click(function(){
       $( '#okship_error' ).html( "" );
       $( '#id_error' ).html( "" );
       $('#approve_form').modal('show');
       var ord_id=$(this).data("id");
       $.ajax({
          url:"{{route('shipment.info')}}",
          type:'post',
          data:{id:ord_id,'_token':"{{csrf_token()}}"},
          success:function(data){
            $('.ship_id').val(data[0].id);
          }
       });
    });

    $('#okshipbtnSave').click(function(){
      
       var ord_id=$('.ship_id').val();
       var option=$('.okship').val();
        $( '#id_error' ).html( "" );
       $( '#okship_error' ).html( "" );
       $.ajax({
          url:"{{route('shipment.oktoship')}}",
          type:'post',
          data:{id:ord_id,option:option,'_token':"{{csrf_token()}}"},
          success:function(data){
             if(data.errors) {
                    if(data.errors.id){
                        $( '#id_error' ).html( data.errors.id[0] );
                    }
                    if(data.errors.option){
                        $( '#okship_error' ).html( data.errors.option[0] );
                    }
                }
              if(data.success)
              {
                $('#approve_form').modal('hide');
                location.reload();
              }
          }
       });
    });


      //============= DatePicker-Part ====================//
          $('.rv_exfact').datepicker({
            format:'yyyy-mm-dd',
            // format:'dd M yy', //show 25 Apr 18.
            //startDate:'today',
            autoclose: true,
          });

           $('.eta').datepicker({
            format:'yyyy-mm-dd',
            // format:'dd M yy', //show 25 Apr 18.
            //startDate:'today',
            autoclose: true,
          });
       });

    </script>

@endsection