<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>

    	<table class="table table-hover table-striped" id="table">

            <thead>
              <tr>
              	<td colspan="30">  <h2><b>Vessel Approval List</b></h2></td>
              
              </tr>
              <tr></tr>
                    <tr>
                            <th class="text-center" style="border: 1">Season</th>
                            <th class="text-center" style="border: 1">Collection Code</th>
                            <th class="text-center" style="border: 1">Collection Description</th>
                            <th class="text-center" style="border: 1">Proto Ref.</th>
                            <th class="text-center" style="border: 1">Style No.</th>
                            <th class="text-center" style="border: 1">Style Description</th>
                            <th class="text-center" style="border: 1">Color Code</th>
                            <th class="text-center" style="border: 1">Supplier</th>
                            <th class="text-center" style="border: 1">PO No</th>
                            <th class="text-center" style="border: 1">Qty Ordered</th>
                            <th class="text-center" style="border: 1">Qty to Ship</th>
                            <th class="text-center" style="border: 1">Total Cost Value to Ship</th>
                            <th class="text-center" style="border: 1">Ratio or Backup?</th>
                            <th class="text-center" style="border: 1">Flat or Hanging?</th>
                            <th class="text-center" style="border: 1">Ex-factory Date</th>
                            <th class="text-center" style="border: 1">Vessel</th>
                            <th class="text-center" style="border: 1">ETA UK</th>
                            <th class="text-center" style="border: 1">OTB Date</th>
                            <th class="text-center">Ok to Ship</th>
                            <th class="text-center">CHK</th>
                            <th class="text-center">Wks Cvr</th>
                            <th class="text-center">Told Shippers</th>
                            <th class="text-center">Container No. Checked on Vessel</th>
                            <th class="text-center">Comments</th>
                            <th class="text-center">MERCH COMMENTS</th>
                            <th class="text-center">Cost price</th>
                            <th class="text-center">Approval week no.</th>
                            <th class="text-center">Cat</th>
                            <th class="text-center">Dept</th>
                            <th class="text-center">Dept Desc</th>
                            <th class="text-center">Merch</th>
                            <th class="text-center">Sourcer</th>
                            <th class="text-center">Country</th>
                    </tr>
            </thead>
            <tbody>
            	<?php $__currentLoopData = $shippinginfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shinfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($shinfo->ok_to_ship=='YES'): ?>
            	<tr style="background-color: #fbc02d">
                    
               
            		<td><?php echo e($shinfo->sea_name); ?></td>
                    <td><?php echo e(''); ?></td>
                    <td><?php echo e(''); ?></td>
                    <td><?php echo e($shinfo->proto); ?></td>
                    <td><?php echo e($shinfo->style_code); ?></td>
                    <td><?php echo e($shinfo->prdct_des); ?></td>
                    <td><?php echo e('0'); ?></td>
                    <td><?php echo e($shinfo->supplier_name); ?></td>
                    <td><?php echo e($shinfo->po_number); ?></td>
                    <td><?php echo e($shinfo->quantity); ?></td>
                 
                
                    <td><?php echo e($shinfo->ship_qty); ?></td>
                   
                    <td><?php echo e(''); ?></td>
                   
                    <td><?php echo e($shinfo->ratio_backup); ?></td>
                   
                    <td><?php echo e($shinfo->flat_hanging); ?></td>
                     
                    <td><?php echo e($shinfo->ex_factory_date); ?></td>

                    
                    <td><?php echo e($shinfo->vessel_name); ?></td>
                    

                      
                    <td><?php echo e($shinfo->ETA_UK); ?></td>
                      
                    <td><?php echo e(''); ?></td>
                    
                    <td><?php echo e($shinfo->ok_to_ship); ?></td>
                     

                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e('0'); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e($shinfo->fob_price); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e('BD'); ?></td>
                   
            	</tr>
                <?php else: ?>
                <tr>
                    <td><?php echo e($shinfo->sea_name); ?></td>
                    <td><?php echo e(''); ?></td>
                    <td><?php echo e(''); ?></td>
                    <td><?php echo e($shinfo->proto); ?></td>
                    <td><?php echo e($shinfo->style_code); ?></td>
                    <td><?php echo e($shinfo->prdct_des); ?></td>
                    <td><?php echo e('0'); ?></td>
                    <td><?php echo e($shinfo->supplier_name); ?></td>
                    <td><?php echo e($shinfo->po_number); ?></td>
                    <td><?php echo e($shinfo->quantity); ?></td>
                 
                
                    <td><?php echo e($shinfo->ship_qty); ?></td>
                   
                    <td><?php echo e(''); ?></td>
                   
                    <td><?php echo e($shinfo->ratio_backup); ?></td>
                   
                    <td><?php echo e($shinfo->flat_hanging); ?></td>
                     
                    <td><?php echo e($shinfo->ex_factory_date); ?></td>

                    
                    <td><?php echo e($shinfo->vessel_name); ?></td>
                    

                      
                    <td><?php echo e($shinfo->ETA_UK); ?></td>
                      
                    <td><?php echo e(''); ?></td>
                    
                    <td><?php echo e($shinfo->ok_to_ship); ?></td>
                     

                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e('0'); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e($shinfo->fob_price); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e(''); ?></td>
                      <td><?php echo e('BD'); ?></td>
                      
                   
                </tr>
                    <?php endif; ?>
            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </tbody>
          </table>
</body>
</html>