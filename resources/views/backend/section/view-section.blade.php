@extends('backend.layouts.master')
@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Student Section</li>
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
          <section class="col-md-7">
           
           <div class="card">
              <div class="card-header"style="background-color: #086A87;color: white">
                <h5 ><b>Student Section List</b>
                  {{-- <a style="font-size: 18px;font-weight: bold"  href="{{route('setups.class-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Student Class</i></a> --}}
                </h3>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: crimson;color: white">
                    <th>SL</th>
                    <th>Section ID</th>
                    <th>Section Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $value)
                    <tr class="{{$value->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$value->id}}</td>
                     
                      <td>{{$value->section_name}}</td>
                     
                  
                      <td>
                    <a title="Edit" href="{{route('setups.section-edit',$value->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('setups.section-delete',$value->id)}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
          </section>

          <section class="col-sm-5">
             <div class="card">
              <div class="card-header" style="background-color: crimson;color: white">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Student Section
              @else
              Add Student Section
              @endif
                 {{--  <a style="font-size: 18px;font-weight: bold"  href="{{route('setups.class-view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Student class List</i></a> --}}
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('setups.section-update',$editdata->id):route('setups.section-store')}}" id="myform">
                @csrf
                <div class="form-row">
                  

                  <div class="form-group col-md-12">
                    <label style="color: #C71585">Student Section Name</label>
                    <input  type="text" name="section_name" id="section_name"value="{{@$editdata->section_name}}" class="form-control" placeholder="Enter Class  Section Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('section_name')?($errors->first('section_name')):''}}</font>
                  </div>

                  

              
                 
               <div class="form-group col-md-12">
    <button type="submit"class="btn btn-primary">{{(@$editdata)?'Update Student class':'Add Student Section'}}</button>

                  </div>
                </div> 
              </form>

                </div>
              </div>
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

      section_name: {
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