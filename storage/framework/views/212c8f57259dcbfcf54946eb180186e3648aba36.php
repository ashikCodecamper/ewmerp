<!-- Bootstrap modal -->
 <div class="modal fade" id="modal_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title">Vessel Information</h3>
     </div>
     <div class="modal-body form">
       <div class="alert alert-success" id="success-alert-vessel">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong>
        Vessel Information Inserted Successfully.
      </div>
       <form action="#" id="form" class="form-horizontal">
       	<?php echo e(csrf_field()); ?>

        <span class="text-success"><strong id="success"></strong></span>
         <input type="hidden" value="" name="ord_id" class="ord_id" />
         <div class="form-body">
           <!-- <div class="form-group">
             <label class="control-label col-md-4">PO Number</label>
             <div class="col-md-8">
               <input type="text" name="po_number" class="form-control">
             </div>
             <span class="text-danger">
                <strong id="degree_error"></strong>
             </span>
           </div> -->

             <div class="form-group">
             <label class="control-label col-md-4">Vessel Name</label>
             <div class="col-md-9">
               <input type="text" name="vessel" class="form-control vessel">
             </div>
             <span class="text-danger">
                <strong id="vessel_error"></strong>
             </span>
           </div> 
           <div class="form-group">
             <label class="control-label col-md-4">Ship Quantity</label>
             <div class="col-md-9">
               <input name="shipqty" placeholder="Quantity" class="form-control shipqty" type="text">
               <span class="text-danger">
                <strong id="ship_error"></strong>
             </span>
             </div>
           </div>
           
           <div class="form-group">
             <label class="control-label col-md-3">Ratio/Backup</label>
             <div class="col-md-9">
              <select class="form-control ratiobackup" name="ratiobackup">
                <option value="">--Select Option--</option>
                <option value="Ratio">Ratio</option>
                <option value="Backup">Backup</option>

              </select>
               <span class="text-danger">
                <strong id="ratiobackup_error"></strong>
             </span>
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-md-3">Flat/Hanging</label>
             <div class="col-md-9">
              <select class="form-control flat" name="flat">
                <option value="">--Select Option--</option>
                <option value="Flat">Flat</option>
                <option value="Hanging">Hanging</option>

              </select>
               <span class="text-danger">
                <strong id="flat_error"></strong>
             </span>
             </div>
           </div>
            <div class="form-group">
             <label class="control-label col-md-3">ETA</label>
             <div class="col-md-9">
              <input type="text" name="eta" class="form-control eta" placeholder="ETA">
               <span class="text-danger">
                <strong id="eta_error"></strong>
             </span>
             </div>
           </div>
            <!-- <div class="form-group">
             <label class="control-label col-md-3">ETD</label>
             <div class="col-md-9">
              <input type="text" name="" class="form-control" placeholder="ETD">
               <span class="text-danger">
                <strong id="institute_error"></strong>
             </span>
             </div>
           </div> -->

         </div>

       </form>
         </div>
         <div class="modal-footer">
           <button type="button" id="vinfobtnSave" class="btn btn-primary">Save</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->