<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>EWM ERP</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
   </head>
   <body>
      <nav class="navbar navbar-inverse bg-primary">
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <a class="navbar-brand" href="#">EWM</a>
      </nav>
     <div class="row" style="margin-top:30px;">
         <div class="col-md-3"></div>
         <div class="col-md-6">
         <div class="card">
         <div class="card-block">
         <h4 class="card-title">Application Form</h4>
         @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form data-parsley-validate method="POST" action="{{route('saveapply',['id'=>$id])}}" enctype="multipart/form-data">
            {{csrf_field()}}
               <div class="form-group">
                  <label for="exampleInputEmail1">Full name</label>
                  <input type="text" required  name="full_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter full name">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">E-mail</label>
                  <input type="email" required name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email">
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Moblie No</label>
                  <input type="text" required name="mobile" class="form-control" id="exampleInputPassword1" placeholder="ex: 01712345678">
               </div>
               <div class="form-group">
                  <label for="exampleInputFile">Upload Your Cv</label>
                  <input type="file" name="cv" required class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                  <small id="fileHelp" class="form-text text-muted"> <strong>max file size 5MB. supported format: doc,docx,pdf only</strong></small>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
      </div>
         </div>
         <div class="col-md-3"></div>
     </div>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
   </body>
</html>