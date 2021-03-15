@extends('user.layouts.master')
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
              <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
          <section class="col-md-10 offset-md-1">
           
           <div class="card" style="border-bottom:solid 5px  #0A4833">
            <div class="card-header" style="background-color: #0A4833;color: white">
                <h5>Student Profile
                  <a style="font-size: 18px"  href="{{route('stprofiles.profile-edit')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-user"> Edid Profile</i></a>
                </h5>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('upload/userimage/'.$user->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture" style="height: 100px;width: 100px">
                </div>

                <h3 style="font-weight: bold;font-size: 22px;justify-content: center;" class="profile-username text-center">Student ID : {{$user->code}} &nbsp;&nbsp;&nbsp; Student Name : {{$user->name}} &nbsp;&nbsp;&nbsp;&nbsp;Class Name : {{$user['class']['class_name']}}</h3>

               <table width="100%" class="table table-bordered">
                  <tr>
                    <th style="text-align: center;font-size: 20px" colspan="4">Role : {{$user['role']['role_name']}} </th>

                  </tr>
                   <tr>
                    <th width="25%">Student ID</th>
                    <td width="25%">{{$user->code}}</td>
                    <th width="25%">Mobile</th>
                    <td width="25%">{{$user->mobile}}</td>
                   </tr>

                   <tr>
                    <th>Class Name</th>
                    <td>{{$user['class']['class_name']}}</td>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                   </tr>
                   <tr>
                    <th>Group Name</th>
                    <td>{{$user['group_name']['group_name']}}</td>
                    <th>Address</th>
                    <td>{{$user->address}}</td>
                   </tr>
                   <tr>
                    <th>Section Name</th>
                    <td>{{$user['section_name']['section_name']}}</td>
                    <th>Date Of Birth</th>
                    <td>{{$user->dob}}</td>
                   </tr>
                    <tr>
                    <th>Session Year</th>
                    <td>{{$user['session_year']['session_year']}}</td>
                    <th>Gender</th>
                    <td>{{$user->mobile}}</td>
                   </tr>

                    <tr>
                    <th>Class Roll</th>
                    <td>{{$user->class_roll}}</td>
                    <th>Religion</th>
                    <td>{{$user->religion}}</td>
                   </tr>
                  
                  
                
               </table>

              </div>
              <!-- /.card-body -->
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