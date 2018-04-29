<!-- Bootstrap modal -->
 <div class="modal fade" id="show_form" role="dialog">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
     	 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h3 class="modal-title">Information</h3>
     </div>
     <div class="modal-body form">

      <div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    Successfully Created.
    </div>
      <form action="#" id="form" class="form-horizontal">
        {{csrf_field()}}
        <span class="text-success"><strong id="success"></strong></span>
         <input type="hidden" value="" name="ord_id" class="ord_id" />
         <div class="form-body">
          <div class="form-group">
            <!--  <label class="control-label col-md-4">Ex-factory</label> -->
             <div class="col-md-8">
               <input type="hidden" name="exfact" class="form-control exfact">
             </div>
             <span class="text-danger">
                <strong id="oexfact_error"></strong>
             </span>
           </div>
           <div class="form-group">
             <label class="control-label col-md-4">New Ex-factory</label>
             <div class="col-md-8">
               <input type="text" name="rv_exfact" class="form-control rv_exfact">
             </div>
             <span class="text-danger">
                <strong id="exfact_error"></strong>
             </span>
           </div>
           <div class="form-group">
             <label class="control-label col-md-4">Comments</label>
             <div class="col-md-8">
              <textarea rows="5" class="form-control comments"></textarea>
               <span class="text-danger">
                <strong id="comments_error"></strong>
             </span>
             </div>
           </div>
         </div>
       </form>
      </div>
         <div class="modal-footer">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-4">
               <button type="button" id="rvex_btnSave" class="btn btn-primary btnSave">Save</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
          
         </div>
       </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
 <!-- End Bootstrap modal -->