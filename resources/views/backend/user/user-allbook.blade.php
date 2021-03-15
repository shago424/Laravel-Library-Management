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
              <li class="breadcrumb-item active">Librarian Wise Book List</li>
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
                <h5>Librarian Wise Book List
                  <a style="font-size: 18px"  href="{{route('issuebooks.issue-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Issue Book</i></a>
                </h5>
              </div> 
            <div class="card-body">
              <table id="" class="table table-bordered table-hover table-sm" width="100%">
                 <tr  >
                   <th  style="font-size: 20px;padding: 8px;text-align: center;" colspan="9">Librarian Information </th>
                 </tr>
                   <tr style="background-color: #AF2136;color: white;padding: 20px;font-size: 20px">
                    <th>Creator ID</th>
                    <th>Librarian Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                  </tr>
                
                  
            <tr  style="padding: 20px;font-size: 20px">
                      
                      <td >{{$allbooks['0']['user']['id']}}</td>
                      <td>{{$allbooks['0']['user']['name']}}</td>
                      <td>{{$allbooks['0']['user']['mobile']}}</td>
                      <td>{{$allbooks['0']['user']['email']}}</td>
                      <td>{{$allbooks['0']['user']['address']}}</td>
                    </tr>
                </table>

              <br> <br>
              
                <table id="example1" class="table table-bordered table-hover table-sm" width="100%">
                  <thead>
                    <tr>
                   <th  style="font-size: 20px;padding: 8px;text-align: center;" colspan="12">Librarian Wise All Issue Books </th>
                 </tr>
                   <tr style="background-color: #0A4833;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Mobile</th>
                    <th>Issue Date</th>
                    <th>Limit Date</th>
                    <th>Return Date</th>
                    <th>Book Category</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th width="8%">Issue Status </th>
                    <th width="8%">Return Status </th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allbooks as $key => $issue)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$issue->id}}</td>
                      <td>{{$issue['student']['name']}}</td>
                       <td>{{$issue['student']['mobile']}}</td>
                      <td>{{date('d-m-Y',strtotime($issue->issu_date))}}</td>
                      <td>{{date('d-m-Y',strtotime($issue->limit_date))}}</td>
                      <td>{{date('d-m-Y',strtotime($issue->return_date))}}</td>
                      <td>{{$issue['category']['category_name']}}</td>
                      <td>{{$issue['book']['book_name']}}</td>
                      <td>{{$issue['book']['author_name']}}</td>
                         <td>
                      @if($issue->status == 1)
                    <span style="padding: 10px" class="badge badge-success">Issued</span>
                    @else
                    <span style="padding: 10px" class="badge badge-warning">Pending</span>
                    @endif
                    <td>
                       @if($issue->back == 0)
                    <span style="padding: 10px" class="badge badge-danger">No Return</span>
                    @else
                    <span style="padding: 10px" class="badge badge-success">Return</span>
                    @endif
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