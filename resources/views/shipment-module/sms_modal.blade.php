<!-- Bootstrap modal -->
 <div class="modal fade" id="sms_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title">Shipment Information</h3>
     </div>
     <div class="modal-body form">
       <div class="alert alert-success" id="success-alert">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>Success! </strong>
        Shipment Information Inserted Successfully.
      </div>
       <form action="#" id="form" class="form-horizontal">
       	{{csrf_field()}}
        <span class="text-success"><strong id="success"></strong></span>
         <input type="hidden" value="" name="ord_id" class="ship_id" />
         <div class="form-body">
         
          <div class="form-group">
             <label class="control-label col-md-9">Invoice No.</label>
             <div class="col-md-9">
               <input type="text" name="" class="form-control inv">
             </div>
             <span class="text-danger">
                <strong id="inv_error"></strong>
             </span>
           </div>

             <div class="form-group">
             <label class="control-label col-md-9">Doc. Sending Date</label>
             <div class="col-md-9">
               <input type="text" name="doc_send" class="form-control doc_send">
             </div>
             <span class="text-danger">
                <strong id="doc_error"></strong>
             </span>
           </div> 
           <div class="form-group">
             <label class="control-label col-md-9">Authorization Date</label>
             <div class="col-md-9">
               <input name=""  class="form-control authdate" type="text">
               <span class="text-danger">
                <strong id="authdate_error"></strong>
             </span>
             </div>
           </div>
           
            <div class="form-group">
             <label class="control-label col-md-9">Payment Date</label>
             <div class="col-md-9">
              <input type="text" name="eta" class="form-control paydate" >
               <span class="text-danger">
                <strong id="pay_error"></strong>
             </span>
             </div>
           </div>
            

         </div>

       </form>
         </div>
         <div class="modal-footer">
           <button type="button" id="smsbtnSave" class="btn btn-primary">Save</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->