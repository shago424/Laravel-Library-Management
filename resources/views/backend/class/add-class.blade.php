@extends('backend.layouts.master')  
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 style="color: #800080"><b>

             


          </b></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active" style="color: green">Add Class</li>
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
       <section class="col-md-12">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87;color: white">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Student class
              @else
              Add Student Class
              @endif
                  <a style="font-size: 18px;font-weight: bold"  href="{{route('setups.class-view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Student class List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('setups.class-update',$editdata->id):route('setups.class-store')}}" id="myform">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-4">
                    <label style="color: #C71585">Student Class Name</label>
                    <input  type="text" name="class_name" id="class_name"value="{{@$editdata->class_name}}" class="form-control" placeholder="Enter Class  class_name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('class_name')?($errors->first('class_name')):''}}</font>
                  </div>

                  

              
                 
               <div class="form-group col-md-6" style="padding-top: 30px">
                    
    
    <button type="submit"class="btn btn-primary">{{(@$editdata)?'Update Student class':'Add Student Class'}}</button>

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

      class_name: {
      required: true,
        
      },
      name: {
        required: true,
        
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
  @endsection