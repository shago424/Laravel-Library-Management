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
              <li class="breadcrumb-item active">Issue Book Pending List</li>
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
                <h5>Issue Book Pending List
                  <a style="font-size: 18px"  href="{{route('issuebooks.issue-view')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus-circle"> Approved Issue Book List</i></a>
                  <a style="font-size: 18px"  href="{{route('issuebooks.issue-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Issue Book</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: crimson;color: white">
                    <th>SL</th>
                    <th>ID</th>
                    <th>Created By</th>
                    <th>Issue Date</th>
                    <th>Limit Date</th>
                    <th>Return Date</th>
                    <th>Student Name</th>
                    <th>Student Mobile</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Status</th>
                    <th width="12%">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($issuebooks as $key => $issue)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$issue->id}}</td>
                      <td style="background: lightgreen">{{$issue['user']['name']}}</td>
                      <td>{{date('d-m-Y',strtotime($issue->issue_date))}}</td>
                      <td>{{date('d-m-Y',strtotime($issue->limit_date))}}</td>
                       @if($issue->return_date==null)
                      <td></td>
                      @else
                      <td>{{date('d-m-Y',strtotime($issue->return_date))}}</td>
                      @endif
                      <td >{{$issue['student']['name']}}</td>
                      <td >{{$issue['student']['mobile']}}</td>
                      <td>{{$issue['book']['book_name']}}</td>
                      <td>{{$issue['book']['author_name']}}</td>
                      
                    <td>
                    <span style="padding: 10px" class="badge badge-danger">Pending</span>
                  </td>
                      <td>
                          <a title="Approved Issue Book" id="approve" href="{{route('issuebooks.active',$issue->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-check-circle" ></i></a>
                         
                    <a title="Edit" href="{{route('issuebooks.issue-edit',$issue->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                    <a title="Delete" id="delete" href="{{route('issuebooks.issue-delete',$issue->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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