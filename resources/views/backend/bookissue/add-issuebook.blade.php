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
              <li class="breadcrumb-item active"> Issue Book</li>
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

          <section class="col-md-12 offset-md-0">
           
           <div class="card">
              <div class="card-header" style="background-color: #086A87 ">
                <h5 style="color: white">
              @if(isset($editdata))
              Edit Book Issue
              @else
              Add Book Issue
              @endif

                  <a  href="{{route('issuebooks.issue-view')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-list"> Issue Book List</i></a>
                </h5>
              </div> 
            <div class="card-body" style="background-color:#CAFAE9 ">
                
            
   
  <form method="POST" action="{{(@$editdata)?route('issuebooks.issue-update',$editdata->id):route('issuebooks.issue-store')}}"
  id="myform">
    @csrf
   <div class="row">
    <div class="col-md-2">
   <div class="form-group text-right">
        <label for="st_id" class="col-sm-12 control-label"> Student Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4 ">
          <select  name="st_id" class="form-control select2bs4" id="st_id">
          <option value="">Select Student  Name</option>
                @foreach($students as $student)
                <option value="{{$student->id}}"{{(@$editdata->st_id==$student->id)?"selected":""}}>( {{$student->name}} ) --- ( {{$student->class_roll}} )---( {{$student->mobile}} ) </option>




                @endforeach
            </select>
          @error('st_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

     <div class="col-md-2">
   <div class="form-group text-right">
        <label for="category_id" class="col-sm-12 control-label"> Book Category <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4 ">
          <select  name="category_id" class="form-control select2bs4" id="category_id">
          <option value="">Select Book Category  Name</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{(@$editdata->category_id==$category->id)?"selected":""}}>{{$category->category_name}}</option>
                @endforeach
            </select>
          @error('category_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>


         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="class_id" class="col-sm-12 control-label">Class Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="class_id" class="form-control text-center" value="{{@$editdata->class_id}}" id="class_id"  readonly  disabled style="background: #ECB9C0">
            @error('class_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>


          <div class="col-md-2">
   <div class="form-group text-right">
        <label for="book_id" class="col-sm-12 control-label"> Book Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4 ">
          <select  name="book_id" class="form-control select2bs4" id="book_id">
          <option value="">Select Book Name</option>
                @foreach($books as $book)
                <option value="{{$book->id}}" {{(@$editdata->book_id==$book->id)?"selected":""}}>( {{$book->book_name}} ) -- ( {{$book->author_name}} )</option>
                @endforeach
            </select>
          @error('book_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

            <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="group_id" class="col-sm-12 control-label">Group Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="group_id" class="form-control text-center" value="{{old('group_id')}}" id="group_id"  readonly  style="background: #ECB9C0" disabled="" >
            @error('group_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>


        <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="author_name" class="col-sm-12 control-label">Author Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="author_name" class="form-control text-left" value="{{old('author_name')}}" id="author_name"  readonly  style="background: #ECB9C0" disabled="" >
            @error('author_name')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

            <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="section_id" class="col-sm-12 control-label">Section Name <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="section_id" class="form-control text-center" value="{{old('section_id')}}" id="section_id"  readonly  style="background: #ECB9C0" disabled="" >
            @error('section_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>


         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="publication" class="col-sm-12 control-label">Publication <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="publication" class="form-control text-leftr" value="{{old('publication')}}" id="publication"  readonly  style="background: #ECB9C0" disabled="" >
            @error('publication')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="session_id" class="col-sm-12 control-label">Session Year <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="session_id" class="form-control text-center" value="{{old('session_id')}}" id="session_id"  readonly  style="background: #ECB9C0" disabled="" >
            @error('session_id')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="stock_quatity" class="col-sm-12 control-label">Stock Quantity <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="stock_quantity" class="form-control text-center" value="{{old('stock_quatity')}}" id="stock_quantity"  readonly style="background: #ECB9C0" disabled="" >
            @error('stock_quatity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-2">
    <div class="form-group text-right"> 
        <label for="class_roll" class="col-sm-12 control-label">Class Roll <span class="text-danger">*</span></label>
      </div>
    </div>
        <div class="col-sm-4">
          <input type="text" name="class_roll" class="form-control text-center" value="{{old('class_roll')}}" id="class_roll"  readonly style="background: #ECB9C0" disabled="">
            @error('class_roll')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="col-md-2">
    
    </div>
        <div class="col-sm-4">
        
        </div>

<hr>

          
    <div class="form-group col-md-4 "> 
        <label for="issue_date" class="col-sm-12 control-label">Issue Date <span class="text-danger">*</span></label>
     
          <input type="text" name="issue_date" class="form-control text-center" value="{{@$editdata->issue_date}}"  id="datepicker"  readonly="" placeholder="YYYY-MM-DD">
            @error('issue_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         <div class="form-group col-md-4 "> 
        <label for="limit_date" class="col-sm-12 control-label">Limit Date <span class="text-danger">*</span></label>
     
          <input type="text" name="limit_date" class="form-control text-center" value="{{@$editdata->limit_date}}"  id="datepicker2"  readonly="" placeholder="YYYY-MM-DD">
            @error('limit_date')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

         
    <div class="form-group col-md-4"> 
        <label for="issue_quantity" class="col-sm-12 control-label">Issue Quantity <span class="text-danger">*</span></label>
      
          <input type="text" name="issue_quantity" class="form-control text-center"   id="issue_quantity"  value="{{(@$editdata)?@$editdata->issue_quantity:'1'}}" >
            @error('issue_quantity')
            <strong class="text-danger">{{$message}}</strong>
            @enderror
        </div>

        <div class="col-md-12 mt-2" >
        <button style="font-weight: bold;font-size: 20px" type="submit"class="btn btn-primary btn-block ">{{(@$editdata)?'Update Issue Book':'Add Issue Book '}}</button>
    </div>

</div>
</form>



  </section>
</div>

</div>
</div>

<!-- add purchase -->

  <!-- dropdown category -->
{{-- <script type="text/javascript">
  $(function(){
    $(document).on('change','#supplier_id',function(){
      var supplier_id =$('#supplier_id').val();

      $.ajax({
        url:"{{route('get-category')}}",
        type:"GET",
        data:{supplier_id:supplier_id},
        success:function(data){
          var html = '<option value="">Select Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.category_id+'">'+v.category.item_name+'</option>';
          });
          $('#category_id').html(html);
        }

      });
    });
  });
</script> --}}


  


 <!-- dropdown sub sub category -->
  
<script type="text/javascript">
  $(function(){
    $(document).on('change','#sub_category_id',function(){
      var sub_category_id =$('#sub_category_id').val();

      $.ajax({
        url:"{{route('get-subsubcategory')}}",
        type:"GET",
        data:{sub_category_id:sub_category_id},
        success:function(data){
          var html = '<option value="">Select Sub Sub Category</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.sub_sub_category_id+'">'+v.subsubcategory.item_name+'</option>';
          });
          $('#sub_sub_category_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown session -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#st_id',function(){
      var st_id =$(this).val();

      $.ajax({
        url:"{{route('get-session')}}",
        type:"GET",
        data:{st_id:st_id},
        success:function(data){
        $('#session_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown bookname -->
<!-- dropdown productname -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#category_id',function(){
      var category_id =$('#category_id').val();

      $.ajax({
        url:"{{route('get-book')}}",
        type:"GET",
        data:{category_id:category_id},
        success:function(data){
          var html = '<option value="">Select Book Name</option>';
          $.each(data,function(key, v){
            html += '<option value="'+v.id+'">'+v.book_name+'</option>';
          });
          $('#book_id').html(html);
        }

      });
    });
  });
</script>

<!-- dropdown class -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#st_id',function(){
      var st_id =$(this).val();

      $.ajax({
        url:"{{route('get-class')}}",
        type:"GET",
        data:{st_id:st_id},
        success:function(data){
        $('#class_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown group -->

<script type="text/javascript">
  $(function(){
    $(document).on('change','#st_id',function(){
      var st_id =$(this).val();

      $.ajax({
        url:"{{route('get-group')}}",
        type:"GET",
        data:{st_id:st_id},
        success:function(data){
        $('#group_id').val(data);
        }

      });
    });
  });
</script>
<!-- dropdown section -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#st_id',function(){
      var st_id =$(this).val();

      $.ajax({
        url:"{{route('get-section')}}",
        type:"GET",
        data:{st_id:st_id},
        success:function(data){
        $('#section_id').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown publication -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#book_id',function(){
      var book_id =$(this).val();

      $.ajax({
        url:"{{route('get-publication')}}",
        type:"GET",
        data:{book_id:book_id},
        success:function(data){
         $('#publication').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown author -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#book_id',function(){
      var book_id =$(this).val();

      $.ajax({
        url:"{{route('get-author')}}",
        type:"GET",
        data:{book_id:book_id},
        success:function(data){
         $('#author_name').val(data);
        
        }

      });
    });
  });
</script>


<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#st_id',function(){
      var st_id =$(this).val();

      $.ajax({
        url:"{{route('get-classroll')}}",
        type:"GET",
        data:{st_id:st_id},
        success:function(data){
        $('#class_roll').val(data);
        }

      });
    });
  });
</script>

<!-- dropdown stock -->
<script type="text/javascript">
  $(function(){
    $(document).on('change','#book_id',function(){
      var book_id =$(this).val();

      $.ajax({
        url:"{{route('get-stock')}}",
        type:"GET",
        data:{book_id:book_id},
        success:function(data){
        $('#stock_quantity').val(data);
        }

      });
    });
  });
</script>

<!-- End dropdown  -->

<!-- paid status  -->
<script type="text/javascript">
  $(document).on('change','#paid_status', function(){
    var paid_status = $(this).val();
    if(paid_status == 'some_paid'){
      $('.paid_amount').show();
    }else{
       $('.paid_amount').hide();
    }
  });
</script>
<!-- customer  -->
<script type="text/javascript">
  $(document).on('change','#customer_id', function(){
    var customer_id = $(this).val();
    if(customer_id == '0'){
      $('.new_customer').show();
    }else{
       $('.new_customer').hide();
    }
  });
</script>



<script>
$(function () {
  
  $('#myform').validate({
    rules: {

    
      issue_quantity: {
      required: true,
        
      },

      category_id: {
      required: true,
        
      },
     
      book_id: {
      required: true,
        
      },

      issue_date: {
      required: true,
        
      },
      book_id: {
        required: true,
        
      },
      invoice_date: {
        required: true,
        
      },
      product_code: {
        required: true,
        
      },

       paid_status: {
        required: true,
        
      },
       
      st_id: {
      required: true,
        
      },
        supplier_id: {
        required: true,
        
      },
      limit_date: {
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
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
    <script>
        $('#datepicker2').datepicker({
            uiLibrary: 'bootstrap4',
            format:'yyyy-mm-dd'
        });
    </script>
  @endsection
