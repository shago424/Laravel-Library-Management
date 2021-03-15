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
              <li class="breadcrumb-item active" style="color: green">Student Wise Books Details</li>
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
              <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>
                Librarian & Student Wise Books Details
             
                  <a  style="font-size: 18px"  href="{{route('issuebooks.issue-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Add Book Issue</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form  method="get" action="{{route('students.allbook-view')}}" id="myform">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-8">
                    <label style="color: #C71585">Student Wise Search</label>
                   <select  name="student_id" class="form-control select2bs4" id="student_id">
          <option value="">Select Student</option>
                @foreach($allstudents as $student)
                <option value="{{$student->id}}">{{$student->id}} -- ( {{$student->name}} ) -- ( {{$student->mobile}} )</option>
                @endforeach 
            </select>
          @error('student_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
                  </div>
                 
               <div class="form-group col-md-4" style="padding-top: 30px">
                    
    
    <button type="submit"class="btn btn-primary">Student Wise Get Books </button>

                  </div>
                </div> 
              </form>

                </div>



{{-- 2nd Card card-body --}}

   <div class="card-body">
                
              <form  method="get" action="{{route('users.allbook-view')}}" id="myform2">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-8">
                    <label style="color: #C71585">User Wise Search</label>
                   <select  name="user_id" class="form-control select2bs4" id="user_id">
          <option value="">Select Librarian</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->id}} -- ( {{$user->name}} ) -- ( {{$user->mobile}} )</option>
                @endforeach 
            </select>
          @error('user_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
                  </div>
                 
               <div class="form-group col-md-4" style="padding-top: 30px">
                    
    
    <button type="submit"class="btn btn-primary">Librarian Wise Issue Books</button>

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

    
      user_id: {
      required: true,
        
      },

      end_date: {
      required: true,
        
      },
     
      student_id: {
      required: true,
        
      },

      
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
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
$(function () {
  
  $('#myform2').validate({
    rules: {

    
      user_id: {
      required: true,
        
      },

      end_date: {
      required: true,
        
      },
     
     

      
      unit_price: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },
       
      product_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      warranty_time: {
        required: true,
        
      },
      unit_id: {
        required: true,
        
      },
       
      purchase_code: {
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
  @endsection