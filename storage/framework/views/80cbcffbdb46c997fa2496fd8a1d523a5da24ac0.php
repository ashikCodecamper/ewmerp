
<?php $__env->startSection('module-name','Compliance'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Supplier basic information</h3>

                    <div class="box-tools" style="float:right;">
                        <a href="<?php echo e(route('cmpHome')); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Back to All Compliance</strong></button></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Managing Director</th>
                                <th>Supplier Corporate Office</th>
                                <th>Supplier site Office</th>
                                <th>Supplier for</th>
                                <th>Supplier No</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(!empty($supplier)): ?>
                                    <tr>
                                        <td><?php echo e($supplier->name); ?></td>
                                        <td><?php echo e($supplier->manaingDirectorDetails); ?></td>
                                        <td><?php echo e($supplier->siteOfficeDetails); ?></td>
                                        <td><?php echo e($supplier->corporateOfficeDetails); ?></td>
                                        <td><?php echo e($supplier->supplierFor); ?></td>
                                        <td><?php echo e($supplier->supplierNo); ?></td>
                                    </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Supplier Bank Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="<?php echo e(route('supplierEdit',['id'=>$supplier->id])); ?>">
                            <button  class="btn bg-purple btn-lg" >Edit Supplier information</button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Bank Name</th>
                            <th>Bank Branch</th>
                            <th>Bank Address</th>
                            <th>Bank Account No</th>
                            <th>Bank Swift</th>
                            <th>Is there any Bank Issue</th>
                            <th>Is there any Work Issu</th>
                        </tr>

                        <?php if(!empty($supplier)): ?>
                            <tr>
                                <td><?php echo e($supplier->bankName); ?></td>
                                <td><?php echo e($supplier->bankBranch); ?></td>
                                <td><?php echo e($supplier->bankAddress); ?></td>
                                <td><?php echo e($supplier->bankAccountNo); ?></td>
                                <td><?php echo e($supplier->bankSwift); ?></td>
                                <?php if($supplier->bankIssue): ?>
                                    <td>yes</td>
                                <?php else: ?>
                                    <td>no</td>
                                <?php endif; ?>
                                <?php if($supplier->workIssue): ?>
                                    <td>yes</td>
                                <?php else: ?>
                                    <td>no</td>
                                <?php endif; ?>


                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Process Details</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Out Source process</th>
                            <th>Total Workforce</th>
                            <th>Total Production Area</th>
                            <th>current Customers</th>

                        </tr>

                        <?php if(!empty($supplier)): ?>
                            <tr>
                                <td><?php echo e($supplier->outSourceProcess); ?></td>
                                <td><?php echo e($supplier->totalWorkForce); ?></td>
                                <td><?php echo e($supplier->productionArea); ?></td>
                                <td><?php echo e($supplier->currentCustomer); ?></td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="<?php echo e(route('smetaEdit',['id'=>$supplier->id])); ?>"><button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Smeta Registration</strong></button></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>ZC Number</th>
                            <th>ZS Number</th>
                            <th>Date Of Expiry</th>
                        </tr>

                        <?php if(!empty($supplier->smeta)): ?>
                            <tr>
                                <td><?php echo e($supplier->smeta->smetaZcNumber); ?></td>
                                <td><?php echo e($supplier->smeta->smetaZsNumber); ?></td>
                                <td><?php echo e($supplier->smeta->smetaExpiryDate); ?></td>
                            </tr>
                            <?php else: ?>
                            <td><button class="btn-blue"><a href="<?php echo e(route('smetaCreate', ['id' => $supplier->id])); ?>">create smeta registration</a></button></td>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>



            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Audit Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="<?php echo e(route('auditEdit',['id'=>$supplier->id])); ?>">
                            <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Smeta Audit details</strong></button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Audit Date</th>
                            <th>Next Audit Date</th>
                            <th>Number Of Caps</th>
                            <th>CLosing Date</th>
                        </tr>

                        <?php if(!empty($supplier->smeta->audit)): ?>
                            <tr>
                                <td><?php echo e($supplier->smeta->audit->smetaAuditDate); ?></td>
                                <td><?php echo e($supplier->smeta->audit->smetaNextAuditDate); ?></td>
                                <td><?php echo e($supplier->smeta->audit->semtaNumberOfCap); ?></td>
                                <td><?php echo e($supplier->smeta->audit->smetaClosingDate); ?></td>
                            </tr>
                        <?php else: ?>
                            <td><button class="btn-blue"><a href="<?php echo e(route('auditCreate', ['id' => $supplier->id])); ?>">create smeta audit</a></button></td>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Smeta Audit Caps</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>TimeLine</th>
                            <th>Verification By Third Party</th>
                            <th>Comments</th>
                        </tr>

                        <?php if(!empty($supplier->smeta->audit->caps)): ?>

                            <?php $__currentLoopData = $supplier->smeta->audit->caps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($cap->description); ?></td>
                                    <td><?php echo e($cap->timeline); ?></td>
                                    <?php if($cap->validationByThirdParty): ?>
                                        <td>Yes</td>
                                    <?php else: ?>
                                        <td>No</td>
                                    <?php endif; ?>
                                    <td><?php echo e($cap->comments); ?></td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                <a href="<?php echo e(route('auditcapCreate', ['id' => $supplier->id])); ?>">
                                     <button class="btn  btn-lg btn-success">create audit caps</button>
                                </a>
                                </td>
                        <?php else: ?>
                            <td><button class="btn-blue"><a href="<?php echo e(route('auditcapCreate', ['id' => $supplier->id])); ?>">create audit caps</a></button></td>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Accord Aliance Details</h3>
                    <div class="box-tools" style="float:right;">
                        <a href="<?php echo e(route('alliance.edit',['id'=>$supplier->id])); ?>">
                            <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit Alliance details</strong></button>
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th>Building Safety Current Percentage</th>
                            <th>Building Safety Expected Percentage</th>

                            <th>Fire Safety Current Percentage</th>
                            <th>Fire Safety Expected Percentage</th>

                            <th>Electrical Safety Current Percentage</th>
                            <th>Electrical Safety Expected Percentage</th>
                        </tr>

                        <?php if(!empty($supplier->alliance)): ?>
                                <tr>

                                    <td><?php echo e($supplier->alliance->bsPercentage); ?>%</td>
                                    <td><?php echo e($supplier->alliance->bsPercentageE); ?>%</td>

                                    <td><?php echo e($supplier->alliance->fsPercentage); ?>%</td>
                                    <td><?php echo e($supplier->alliance->fsPercentageE); ?>%</td>

                                    <td><?php echo e($supplier->alliance->esPercentage); ?>%</td>
                                    <td><?php echo e($supplier->alliance->esPercentageE); ?>%</td>

                                </tr>
                        <?php else: ?>
                            <td><button class="btn-blue"><a href="<?php echo e(route('alliance.create', ['id' => $supplier->id])); ?>">create alliance </a></button></td>
                        <?php endif; ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>



            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Current Compliance Approval</h3>
                    <?php if(!empty($supplier->alliance)): ?>
                        <div class="box-tools" style="float:right;">
                            <a href="<?php echo e(route('approval.edit',['id'=>$supplier->id])); ?>">
                                <button type="buton" class="btn bg-purple btn-lg" ><strong>Edit current Compliance Approval</strong></button>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>sedex audit</th>
                            <th>sedex expiry</th>

                            <th>bsci audit</th>
                            <th>bsci expiry date</th>

                            <th>wrap audit</th>
                            <th>wrap expiry</th>

                            <th>ics/wca audit</th>
                            <th>ics/wca expiry</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php if(!empty($supplier->approval)): ?>
                            <tr>
                                <td><?php echo e($supplier->approval->sedex_auditdate); ?></td>
                                <td><?php echo e($supplier->approval->sedex_expirydate); ?></td>

                                <td><?php echo e($supplier->approval->bsci_auditdate); ?></td>
                                <td><?php echo e($supplier->approval->bsci_expirydate); ?></td>

                                <td><?php echo e($supplier->approval->wrap_auditdate); ?></td>
                                <td><?php echo e($supplier->approval->wrap_expirydate); ?></td>

                                <td><?php echo e($supplier->approval->ics_auditdate); ?></td>
                                <td><?php echo e($supplier->approval->ics_expirydate); ?></td>
                            </tr>

                        <?php else: ?>
                            <td><button class="btn-blue"><a href="<?php echo e(route('approval.create', ['id' => $supplier->id])); ?>">create current compliance</a></button></td>

                        <?php endif; ?>

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>


            <!-- /.box -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apps', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>