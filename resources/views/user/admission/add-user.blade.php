<!DOCTYPE html> 
<html>
<head>
    <title>Student Registration</title>
     <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
    
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
  <a class="navbar-brand" href="{{url('/')}}"><i class="fa fa-home"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a style="font-size: 20px;" class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{route('login')}}">Admin Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{route('login')}}">Librarian Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{route('login')}}">Student Login</a>
    </li>
    <li class="nav-item">
        <a style="font-size: 20px;" class="nav-link" href="{{route('students.add')}}">Student Registration</a>
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
  
<div class="card-body" style="background-color:   lightgray">

     @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  
  <strong>{{session::get('success')}}</strong> 
  
</div> 
@endif

 @if(Session::get('errr'))
                        <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  
  <strong>{{session::get('errr')}}</strong> 
  
</div> 
@endif
                <br>
         <form method="POST" action="{{ route('students.store') }}" id="myform">
            @csrf

            
            <div class="form-group row"> 
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student Name') }} <font class="text-danger">*</font></label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Student Name">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


        <div class="form-group row">
            <label for="class_id" class="col-md-4 col-form-label text-md-right">Class Name<font class="text-danger">*</font></label>

            <div class="col-md-6">
               <select  name="class_id" class="form-control select2bs4" id="class_id">
          <option value="">Select Class Name</option>
                @foreach($classess as $class)
               <option value="{{$class->id}}">{{$class->class_name}}</option>
                @endforeach 
            </select>
          @error('class_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
            </div>
        </div>

             <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Group Name<font class="text-danger">*</font></label>
                <div class="col-md-6">
                    <select  name="group_id" class="form-control select2bs4" id="group_id">
                        <option value="">Select Group Name</option>
                          @foreach($groups as $group)
                         <option value="{{$group->id}}">{{$group->group_name}}</option>
                          @endforeach 
                      </select>
                    @error('group_id')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                </div>

                <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Section Name<font class="text-danger">*</font></label>
                <div class="col-md-6">
                    <select  name="section_id" class="form-control select2bs4" id="section_id">
                        <option value="">Select Section Name</option>
                          @foreach($sections as $section)
                         <option value="{{$section->id}}">{{$section->section_name}}</option>
                          @endforeach 
                      </select>
                    @error('section_id')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">Session Name<font class="text-danger">*</font></label>
                <div class="col-md-6">
                    <select  name="session_id" class="form-control select2bs4" id="supplier_id">
                        <option value="">Select Session Year</option>
                          @foreach($sessions as $session)
                         <option value="{{$session->id}}">{{$session->session_year}}</option>
                          @endforeach 
                      </select>
                    @error('session_id')
                      <strong class="text-danger">{{$message}}</strong>
                      @enderror
                    </div>
                </div>

                         <div class="form-group row">
                            <label for="class_roll" class="col-md-4 col-form-label text-md-right">Class_Roll<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="class_roll" name="class_roll" type="text" class="form-control @error('class_roll') is-invalid @enderror" class_roll="class_roll" value="{{ old('class_roll') }}"placeholder="Enter Class Roll" >

                                @error('class_roll')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="mobile" name="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" mobile="mobile" value="{{ old('mobile') }}"placeholder="Enter Mobile" >

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password<font class="text-danger">*</font></label>

                            <div class="col-md-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 

 <script>
$(function () {
  
  $('#myform').validate({
    rules: {

      group_id: {
      required: true,
        
      },
      name: {
        required: true,
        
      },

      class_id: {
        required: true,
      },
     
       session_id: {
        required: true,
      },

       section_id: {
        required: true,
      },

       class_roll: {
        required: true,
      },

      mobile: {
        required: true,
      },
     
      password_confirmation: {
      required: true,
      equalTo:'#password'
        
      }
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
        
      },

      name: {
        required: "Please enter Name",
        
      },
      
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      password_confirmation: {
        
        equalTo:"Confirm password Does Not Match",
        }
   
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</body>
</html>