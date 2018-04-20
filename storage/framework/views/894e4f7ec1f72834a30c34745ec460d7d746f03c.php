<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EWM ERP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <style>
        .jobitem:hover {
            background: #E8E9EB;
        }
        .jobitem a {
                       cursor: pointer;
        }

    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse bg-primary">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">EWM</a>
    </nav>
    <?php $__currentLoopData = $joblists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $joblist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- vacancy card start -->
    
    <div class="row" style="margin-top:20px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
             <div class="card" style="background:#f5f5f5;">
                 
                    <div class="card-block  jobitem">
                    <a href="<?php echo e(route('vacancyshow',$joblist->id)); ?>">
                        <h3><?php echo e($joblist->job_title); ?></h3>
                    </a>
                     <div class="row">
                        <div class="col-md-2">
                            <strong>Education:</strong>
                        </div>
                        <div class="col-md-9">
                        <p><?php echo e($joblist->edu_req); ?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-2">
                            <strong>Experience:</strong>
                        </div>
                        <div class="col-md-4">
                        <p><?php echo e($joblist->exp_req); ?>)</p>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-4">
                            <strong>Deadline:</strong>
                            <?php echo e(date("jS F, Y", strtotime($joblist->job_deadline))); ?>

                        </div>
                     </div>
                     
                    </div>
                    
            </div>

        </div>
        <div class="col-md-2"></div>
    </div>
    
    <!-- vacancy card end -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>