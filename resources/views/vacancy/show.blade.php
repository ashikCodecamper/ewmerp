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
      <div class="card">
         <div class="card-block">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    <h3>{{$joblist->job_title}}</h3>
                    <strong>Vacancy : </strong> <strong>{{ $joblist->job_vacancy }}</strong>
                    
                    <p><strong>Job Description / Responsibility</strong></p>
                    <p>
                     {!! $joblist->job_description !!}
                    </p>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                       <a href="{{route('apply', ['id'=>$joblist->id])}}"><button class="btn btn-lg btn-success">Apply</button></a>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
 
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <h5 class="card-header bg-inverse text-white">Job Summary</h5>
                        <div class="card-block">
                       <strong>Published on:</strong><p>{{$joblist->created_at->format(' jS  F Y')}}</p> 
                        <strong>Job Nature:</strong> <p>{{$joblist->job_nature}}</p>
                        <strong>Experience:</strong> <p>{{$joblist->exp_req}}</p>
                        <strong>Application Deadline:</strong><p>{{date("jS F, Y", strtotime($joblist->job_deadline))}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>
         </div>
      </div>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   </body>
</html>