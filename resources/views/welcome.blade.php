<!DOCTYPE html> 
<html>
<head>
    <title>Admission Panel</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   
</head>
<body> 
        
<div class="container">
  <div class="row justyfy-content-center mt-4">
    <div class="col-md-10 m-auto">
     <div class="card text-center">
  <div class="card-header" style="background-color: #3a364f;color: white">
    <h1>SSB Freelancer Club</h1>
    <h4>Library Managment System</h4>
  </div>
 
</div>
    </div>

    <!--- Nav bar Start-->

    <div class="col-md-10 m-auto">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><i class="fa fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="font-size: 20px;" class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{ route('login') }}">Admin Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{ route('login') }}">Librarian Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{ route('login') }}">Student Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{ route('students.add') }}">Student Registration</a>
    </li>
     {{--  </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> --}}
     
    </ul>
   
  </div>
</nav>
    </div>
<!--- Nav bar end-->
    <!--- Main Body-->
    <div class="col-sm-10 m-auto">
<!--- Login Panel--> 
  
            <div class="card-body" style="background-color:   #b4c0c4 ">
                     @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  
  <strong>{{session::get('success')}}</strong> 
  
</div> 
@endif
                <br> <br>
                <form action="{{route('login')}}" method="POST">
                    @csrf
              <div class="row justify-content-center">
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    
                    <div class="col-sm-3">
                    
                    </div>

                    <div class="col-sm-6"> 
                   <div class="col-sm-10" style="margin-left: 30px">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                       <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"autofocus placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                    </div>
                    </div>
                    <div class="col-sm-10"style="margin-left: 30px"> 
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    </div>
                    <div class="col-sm-10"style="margin-left: 30px">
                    <div class="form-group">
                        <input type="submit" value="Sign In" class="btn btn-primary  float-right">
                    </div>
                    </div>
                    </div>
                    <div class="col-sm-3">
                     
                
                </div>
            </div>
                </form>
                <br>
                
               
                <div class="d-flex justify-content-center">
                     @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}"><strong style="color: blue;font-size: 18px;font-weight: bold;">
                                        {{ __('Forgot Your Password?') }}</strong>
                                    </a>
                                @endif
                </div>
            </div>


            
               
           
        



   <!--- Login Panel End-->
  

  <!--- Content Footer-->
  <div class="card-footer text-muted text-center"style="background-color: #3a364f;color: white">
    Copyright 2020.&nbsp;&nbsp; All Rights Reserved<br>
 Powered by SSB Freelancer Club
  
  </div>
</div>
    </div>
  </div>
</div>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    



  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>

  
 <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="jrPyqTl9"></script>
  </script>


</body>
</html>