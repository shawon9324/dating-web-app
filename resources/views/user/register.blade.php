<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<div class="container">
<br><br><br>
    <div class="row">
        <div class="col-md-6">
            <form name="userRegisterForm" id="userRegisterForm" action="{{url('/register')}}" method="POST" enctype="multipart/form-data" >@csrf
              <input type="text" name="ip" id="ip" value="" hidden>  
              <div class="form-group">
                    <label for="">Enter Name</label>
                    <input type="text" class="form-control" name="name" id="name"  placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Enter Email</label>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Enter Password</label>
                    <input type="password" class="form-control" name="password" id="password"  placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Enter Date of Birth</label>
                    <input type="date" class="form-control" name="dob" id="dob"  placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="">Select Gender</label>
                    <select class="form-control" name="gender" id="gender">
                      <option value="male" >Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Profile Picture</label>
                    <input type="file" class="form-control-file" name="image" id="image" placeholder="" >
                  </div>
                  <?php 
                //   $lat = navigato.geolocation.getCurrentPosition(position.coords.latitude);
                //   $long = navigato.geolocation.getCurrentPosition(position.coords.longitude);
                  ?>
                  <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>

                

        </div>
    </div>
</div>
   



<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script type="text/javascript">
     $.getJSON("https://api.ipify.org?format=json", 
        function(data) { 
            document.getElementById("ip").value = data.ip ;
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>