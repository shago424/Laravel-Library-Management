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
              <li class="breadcrumb-item active">Change Password</li>
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
      
        <div class="card">
         <div class="card-header" style="background-color: lightgray;">
          <div class="row">
            <div class="col-md-3">
                <h5><a class="btn btn-success" href="{{ route('showbooks.show-book-view') }}"> All Book Shows</a></h5></div>
                <div class="col-md-6">
                  <form method="get" action="{{ route('books.search-book') }}" id="myform">
                    <div class="input-group ">
                      <input type="search" name="q" class="form-control search_input" placeholder="Enter Book Name" id="search">
                      <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary">Search Book</button>
                      </span>
                    </div>
                  </form>
                </div>

                <div class="col-md-3">
                  <a style="font-size: 18px"  href="{{route('students.allbook-issue-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> Add Issue Book</i></a>
                </div>
                </div>
              </div>
        </div>

  <div class="row">

     @if($books->isEmpty())
     <div class="col-md-12 text-center" >
    <h3 style="text-align: center;" class=" text-danger">Book Not Found</h3>
    </div>
    @else

     @foreach($books as $book)
    <div class="col-md-3" >
 <div class="card mb-3 main_item" style="height: 350px;overflow: hidden;border-bottom: 3px solid #0A4833" >
  <img src="{{asset('backend/bookimage/'.$book->image)}}" class="card-img-top" alt="..." style="width: 100%;max-height: 150px">
  <div class="card-body" style="display: block;">
    <p class="card-text p-0 m-0 book-name" style="font-weight: bold;font-size: 16px;display: block;border-bottom: 2px solid;color: #0A4833" class="card-title">{{ $book->book_name }}</p class="card-text p-0">
    <p class="card-text p-0 m-0" style="padding-top: 3px;font-size: 14px;display: block;" class="card-title"><span style="font-weight: bold;"> Category Name :</span> {{ $book['category']['category_name']}}</p class="card-text p-0 m-0">
     <p class="card-text p-0 m-0" style="padding-top: 3px;font-size: 14px" class="card-title"> <span style="font-weight: bold;"> Author Name :</span> {{ $book->author_name }}</p>
     <p class="card-text p-0 m-0" style="padding-top: 3px;font-size: 14px" class="card-title"> <span style="font-weight: bold;"> Publication :</span> {{ $book->publication }}</p>
      <p class="card-text p-0 m-0" style="padding-top: 3px;font-size: 14px" class="card-title"> <span style="font-weight: bold;"> Stock Quantity :</span> {{ $book->quantity }}</p class="card-text">
    
  </div>
</div>
     
    </div>

     @endforeach

   
    
    
   
@endif
</div>

   </div>
 </section>
</div>

      <!-- /.row (main row) -->
    
  <!-- /.content-wrapper -->
  {{-- <script type="text/javascript">
    $(document).ready(function(){
        $(".search_input").on('keyup',function(){
          var _q=$(this).val();
          if(_q.length>=3){
            $.ajax({
              url:"{{ route('books.search-book') }}",
              data:{
                q:_q
              },
              dataType:'json',
              beforeSend:function(){
                  $(".search_result").html('<p class="book-name">Loading....</p>');
              },
              success:function(res){
                  var _html='';
                  $.each(res.data,function(index,data){
                    _html +='<p class"book-name">'+data.book_name+'</p>';
                  });
                  $(".search_result").html(_html);
              }
            });
          }
        });
    });
  </script>
 --}}
<script>
$(function () {
  
  $('#myform').validate({
    rules: {

      search: {
        required: true,
        match: true
       
      },
      new_password: {
        required: true, 
        minlength: 8
      },
      confirm_password: {
      required: true,
      equalTo:'#new_password'
        
      }
    },
    messages: {
     old_password: {
        required: "Please enter  Current Password",
        
        
      },

     
      new_password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },

      confirm_password: {
        required: "Please enter Confirm password",
        equalTo:"Confirm password Does Not Match"
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