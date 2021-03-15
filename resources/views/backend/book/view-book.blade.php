@extends('backend.layouts.master')
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
              <li class="breadcrumb-item active">Book</li>
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
           
           <div class="card" style="border:5px solid lightgray">
              <div class="card-header" style="background-color: #086A87;color: white">
                <h5>Book List
                  <a  href="{{route('books.book-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Book</i></a>
                  <a target="_blank" href="{{route('books.book-view-pdf')}}" class="btn btn-danger btn-sm float-right"><i class="fa fa-download"> All Book PDF Download</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: crimson;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Created By</th>
                    <th>Book Name</th>
                    <th>Category</th>
                    <th>Author Name</th>
                    <th>Quantity</th>
                    <th>Add Date</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $key => $book)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$book->id}}</td>
                      <td style="background: lightgreen">{{$book['user']['name']}}</td>
                      <td>{{$book->book_name}}</td>
                      <td>{{$book['category']['category_name']}}</td>
                      <td>{{$book->author_name}}</td>
                      <td style="text-align: center;">{{$book->quantity}}</td>
                      <td>{{date('d-m-Y',strtotime($book->created_at))}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-book-img img-fluid img-circle"
                       src="{{(!empty($book->image))?url('backend/bookimage/'.$book->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                    <td>
                     @if($book->status==1)
                    <span style="padding: 10px" class="badge badge-success">Active</span>
                    @else
                    <span style="padding: 10px" class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                      <td>
                         @if($book->status==1)
                          <a href="{{route('books.inactive-book',$book->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a href="{{route('books.active-book',$book->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                    <a title="Edit" href="{{route('books.book-edit',$book->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                    <a title="Delete" id="delete" href="{{route('books.book-delete',$book->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td> 
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
  @endsection