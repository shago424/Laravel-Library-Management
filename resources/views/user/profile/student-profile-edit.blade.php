@extends('user.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row ">
          <div class="col-sm-6">
          
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Update Profile</li>
            </ol>
          </div> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-8 offset-md-2">
           
           <div class="card" style="border-bottom: solid 5px #0A4833;">
             <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>Student Update Profile
                  <a style="font-size: 18px"  href="{{route('stprofiles.profile-view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> View Profile</i></a>
                </h5>
              </div>
            <div class="card-body">
                
              <form method="post" action="{{route('stprofiles.profile-update',$editdata->id)}}" id="myform"enctype="multipart/form-data">
                @csrf
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="{{$editdata->name}}">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="name">Class Name</label>
                  <select  name="class_id" class="form-control select2bs4" id="class_id">
                      <option value="">Select Class  Name</option>
                      @foreach($classess as $class)
                      <option value="{{$class->id}}" {{(@$editdata->class_id==$class->id)?"selected":""}}>{{$class->class_name}}</option>
                      @endforeach
                   </select>
                  @error('class_id')
                 <strong class="text-danger">{{$message}}</strong>
                  @enderror
                  </div>

                 <div class="form-group col-md-6">
                    <label for="name">Group Name</label>
                  <select  name="group_id" class="form-control select2bs4" id="group_id">
                      <option value="">Select Group  Name</option>
                      @foreach($groups as $group)
                      <option value="{{$group->id}}" {{(@$editdata->group_id==$group->id)?"selected":""}}>{{$group->group_name}}</option>
                      @endforeach
                   </select>
                  @error('group_id')
                 <strong class="text-danger">{{$message}}</strong>
                  @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Section Name</label>
                  <select  name="section_id" class="form-control select2bs4" id="group_id">
                      <option value="">Select Section  Name</option>
                      @foreach($sections as $section)
                      <option value="{{$section->id}}" {{(@$editdata->section_id==$section->id)?"selected":""}}>{{$section->section_name}}</option>
                      @endforeach
                   </select>
                  @error('section_id')
                 <strong class="text-danger">{{$message}}</strong>
                  @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="name">Session Year</label>
                  <select  name="session_id" class="form-control select2bs4" id="group_id">
                      <option value="">Select Session  Year</option>
                      @foreach($sessions as $session)
                      <option value="{{$session->id}}" {{(@$editdata->session_id==$session->id)?"selected":""}}>{{$session->session_year}}</option>
                      @endforeach
                   </select>
                  @error('session_id')
                 <strong class="text-danger">{{$message}}</strong>
                  @enderror
                  </div>

                  <div class="form-group col-md-6">
                    <label for="class_roll">Class Roll</label>
                    <input type="text" name="class_roll" id="class_roll" class="form-control" placeholder="Enter Class Roll"value="{{$editdata->class_roll}}">
                    <font style="color:red">{{($errors)->has('class_roll')?($errors->first('class_roll')):''}}</font>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"value="{{$editdata->email}}">
                    <font style="color:red">{{($errors)->has('email')?($errors->first('email')):''}}</font>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name">Mobile</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number"value="{{$editdata->mobile}}">
                  </div>

                  

                  <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"value="{{$editdata->address}}">
                  </div>

                   <div class="form-group col-md-6">
                    <label for="dob">Date Of Birth</label>
                    <input type="text" name="dob"  id="datepicker" class="form-control" readonly="" placeholder="YYYY-MM-DD"value="{{$editdata->dob}}">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                    <select name="religion" id="religion" class="form-control select2bs4">
                      <option value="">Select Religion</option>
                      <option value="Islam"{{($editdata->religion=="Islam")?"selected":""}}>Islam</option>
                      <option value="Hindu"{{($editdata->religion=="Hindu")?"selected":""}}>Hindu</option>
                      <option value="Cristian"{{($editdata->religion=="Cristian")?"selected":""}}>Cristian</option>
                      <option value="Budhoo"{{($editdata->religion=="Budhoo")?"selected":""}}>Budhoo</option>
                      <option value="Others"{{($editdata->religion=="Others")?"selected":""}}>Others</option>
                    </select>
                  </div>

                    <div class="form-group col-md-6">
                    <label for="religion">Religion</label>
                   <select name="gender" id="gender" class="form-control select2bs4">
                      <option value="">Select Gender</option>
                      <option value="Male"{{($editdata->gender=="Male")?"selected":""}}>Male</option>
                      <option value="Female"{{($editdata->gender=="Female")?"selected":""}}>Female</option>
                      <option value="Others"{{($editdata->gender=="Others")?"selected":""}}>Others</option>
                    
                    </select>
                  </div>



                 
                 

                  <div class="form-group col-md-6">
                    <img id="showimage" src="{{(!empty($editdata->image))?url('upload/userimage/'.$editdata->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture" style="width: 120px;height: 140px;border:1px solid #000;">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" >
                  </div>

                    <div class="form-group col-md-12">
                    
                <input style="font-weight:bold;font-size: 18px" type="submit" value=" Update Profile" name="submit" class="btn btn-danger float-right btn-block">
                  </div>
                </div> 
              </form>

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT --> 
            
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

      usertype: {
      required: true,
        
      },
      name: {
        required: true,
        
      },
      mobile: {
        required: true,
        
      },
      gender: {
        required: true,
        
      },
       
      address: {
      required: true,
        
      },
    datepicker: {
      required: true,
        
      },

      email: {
        required: true,
        email: true
       
      },
      password: {
        required: true, 
        minlength: 6
      },
      cpassword: {
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

      cpassword: {
        
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

<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection