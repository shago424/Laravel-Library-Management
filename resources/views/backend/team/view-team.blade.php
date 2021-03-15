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
              <li class="breadcrumb-item active">Team Section</li>
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
                <h5>Team Section List
                {{--   @if($countlogo<1) --}}
                  <a  href="{{route('sections.team-add')}}" class="btn btn-warning btn-sm float-right"><i class="fa fa-plus-circle"> Add Team Section</i></a>
                  {{-- @endif --}}
                </h5>
              </div> 
            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm">
                  <thead>
                   <tr style="background-color: #641e16;color: white">
                    <th>SL</th>
                    <th>Team ID</th>
                    <th>Name</th>
                    <th>Title</th> 
                    <th>Description</th>
                    <th>File CV</th>
                    <th style="text-align: center;">Image</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($alldata as $key => $team)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$team->id}}</td>
                      <td>{{$team->name}}</td>
                      <td>{{$team->title}}</td>
                      <td>{{$team->description}}</td>
                      <td style="text-align: center;"> <a target="_blank" href="{{(!empty($team->file))?url('backend/file/'.$team->file):url('upload/usernoimage.png')}}"><img style="width: 50px;height: 60px" class=""
                       alt=" CV PDF File"></a></td>
                      <td style="text-align: center;"><img style="width: 50px;height: 60px" class="profile-team-img img-fluid img-circle"
                       src="{{(!empty($team->image))?url('backend/image/team/'.$team->image):url('upload/usernoimage.png')}}"
                       alt="team profile picture"></td>
                      <td>
                    <a title="Edit" href="{{route('sections.team-edit',$team->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                    <a title="Delete" id="delete" href="{{route('sections.team-delete',$team->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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