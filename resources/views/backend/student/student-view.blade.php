@extends('backend.layouts.master')
@section('content') 


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
          </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
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
                <h5>Student List
                  <a target="_blank" style="font-size: 18px"  href="{{route('students.view-pdf')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-download"> All Student PDF Download</i></a>
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: crimson;color: white">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Session</th>
                    <th>Roll</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $key => $user)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user['class_name']['class_name']}}</td>
                      <td>{{$user['section_name']['section_name']}}</td>
                      <td>{{$user['session_year']['session_year']}}</td>
                      <td>{{$user->class_roll}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->mobile}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('upload/userimage/'.$user->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                    <td>
                     @if($user->status==1)
                    <span style="padding: 10px" class="badge badge-success">Active</span>
                    @else
                    <span style="padding: 10px" class="badge badge-danger">Inactive</span>
                    @endif
                  </td>
                      <td width="15%">
                         @if($user->status==1)
                          <a href="{{route('students.inactive-student',$user->id)}}" class="btn  btn-warning btn-xs mr-2"> <i class="fa fa-arrow-up"></i></a>
                          @else
                          <a href="{{route('students.active-student',$user->id)}}" class="btn btn-success btn-xs mr-2" > <i class="fa fa-arrow-down"></i></a>
                          @endif
                    <a title="Show" href="{{route('students.show',$user->id)}}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-eye"></i></a>

                    <a title="Edit" href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                    <a title="Delete" id="delete" href="{{route('users.delete',$user->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
  {{-- $student = App\Models\User:where('role_id','2')->where('id',$users->id)->get(); --}}
   <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content ">
            <div style="background: gray" class="modal-header">
              <h4 class="modal-title">Large Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-bordered table-hover table-sm">
                <tr>
                  <th width="50%">Student ID</th>
                  <td width="50%">{{ $users['0']['id']}}</td>
                </tr>
              </table>
            </div>
            <div style="background: gray" class="modal-footer float-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  <!-- /.content-wrapper -->
  @endsection