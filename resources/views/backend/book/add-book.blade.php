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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Book</li>
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
        <div class="row justify-content-center">
          <!-- Left col -->
          

          <section class="col-sm-8">
             <div class="card">
              <div class="card-header" style="background-color: crimson;color: white">
                <h5 ><b>
                   @if(isset($editdata))
              Edit Book Category
              @else
              Add Book Category
              @endif
                  <a style="font-size: 18px;font-weight: bold"  href="{{route('books.book-view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-list"> Book List</i></a>
               </b> </h5>
              </div> 
            <div class="card-body">
                
              <form method="post" action="{{(@$editdata)?route('books.book-update',$editdata->id):route('books.book-store')}}" id="myform" enctype="multipart/form-data">
                @csrf

                <div class="form-row justify-content-center">

                  <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Book Category Name</label>
                  </div>
                  <div class="col-md-8">
                   <select  name="category_id" class="form-control select2bs4" id="category_id">
          <option value="">Select Category</option>
                @foreach($categories as $category)
               <option value="{{$category->id}}" {{(@$editdata->category_id==$category->id)?"selected":""}}>{{$category->category_name}}</option>
                @endforeach 
            </select>
          @error('category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
                  </div>


                  <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Book Name</label>
                  </div>
                  <div class="col-md-8">
                    <input  type="text" name="book_name" id="book_name"value="{{@$editdata->book_name}}" class="form-control" placeholder="Enter Book Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('book_name')?($errors->first('book_name')):''}}</font>
                  </div>

                  <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Book title</label>
                  </div>
                  <div class="col-md-8">
                    <input  type="text" name="book_title" id="book_title"value="{{@$editdata->book_title}}" class="form-control" placeholder="Enter Book title" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('book_name')?($errors->first('book_title')):''}}</font>
                  </div>


                    <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Author Name</label>
                  </div>
                  <div class="col-md-8">
                    <input  type="text" name="author_name" id="author_name"value="{{@$editdata->author_name}}" class="form-control" placeholder="Enter author Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('author_name')?($errors->first('author_name')):''}}</font>
                  </div>

                     <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Publication Name</label>
                  </div>
                  <div class="col-md-8">
                    <input  type="text" name="publication" id="publication"value="{{@$editdata->publication}}" class="form-control" placeholder="Enter Publication Name" style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('publication')?($errors->first('publication')):''}}</font>
                  </div>

                    <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;">Book Quantity</label>
                  </div>
                  <div class="col-md-8">
                    <input  type="text" name="quantity" id="quantity" value="{{@$editdata->quantity}}" class="form-control" placeholder="Enter Book Quantity " style="color: #2F4F4F">
                    <font style="color:red">{{($errors)->has('quantity')?($errors->first('quantity')):''}}</font>
                  </div>


                    <div class="form-group col-md-4 text-right">
                    <label style="color: #C71585;text-align: right;" for="image">Book Cover Photo</label>
                  </div>
                  <div class="col-md-8">
                   <img id="showimage" src="{{(!empty($editdata->image))?url('backend/bookimage/'.$editdata->image):url('upload/usernoimage.png')}}" style="width: 100px;height: 120px;border:1px solid #000;">
                    
                    <input  type="file" name="image" id="image"value="{{@$editdata->image}}" class="form-control">
                    <font style="color:red">{{($errors)->has('quantity')?($errors->first('quantity')):''}}</font>
                  </div>


                  
                  


                 
               <div class="form-group col-md-12 mt-3" >
    <button style="font-weight: bold;font-size: 20px" type="submit"class="btn btn-primary btn-block ">{{(@$editdata)?'Update Book':'Add Book '}}</button>

                  </div>
                
              </form>
              </div>
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

    
      book_name: {
        required: true,
        
      },

category_id: {
        required: true,
        
      },


       quantity: {
      required: true,
        
      },
      publication: {
        required: true,
        
      },

       author_name: {
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