<!-- Bootstrap modal -->
 <div class="modal fade" id="approve_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title">Vessel Approve</h3>
     </div>
     <div class="modal-body form">
       <!-- <div class="alert alert-success" id="success-alert-vessel">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong>
        Vessel Approve Successfully.
      </div> -->
       <form action="#" id="form" class="form-horizontal">
       	<?php echo e(csrf_field()); ?>

        <span class="text-success"><strong id="success"></strong></span>
         <input type="hidden" value="" name="_id" class="ship_id" />
         <span class="text-danger">
                <strong id="id_error"></strong>
             </span>
         <div class="form-body">
         
           <div class="form-group">
             <label class="control-label col-md-3">Ok to Ship</label>
             <div class="col-md-9">
              <select class="form-control okship" name="">
                <option value="">--Select Option--</option>
                <option value="YES">YES</option>
                <option value="NO">NO</option>

              </select>
               <span class="text-danger">
                <strong id="okship_error"></strong>
             </span>
             </div>
           </div>
         
          
         </div>

       </form>
         </div>
         <div class="modal-footer">
           <button type="button" id="okshipbtnSave" class="btn btn-primary">Save</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->