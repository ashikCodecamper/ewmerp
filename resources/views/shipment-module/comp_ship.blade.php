<!-- Bootstrap modal -->
 <div class="modal fade" id="cps_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title">Shipment Status</h3>
     </div>
     <div class="modal-body form">
      
       <form action="#" id="form" class="form-horizontal">
       	{{csrf_field()}}
        <span class="text-success"><strong id="success"></strong></span>
         <input type="hidden" value="" name="_id" class="ship_id" />
         <span class="text-danger">
                <strong id="id_error"></strong>
             </span>
         <h3 class="text-warning">Are you sure to this Action ?</h3>

       </form>
         </div>
         <div class="modal-footer">
           <button type="button" id="cpshipbtnSave" class="btn btn-primary">Complete</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->