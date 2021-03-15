<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> All Student PDF Report</title>
  </head>
  <body>
        <table width="100%" style="border:solid;" >
          <tr>
            <td style="text-align: center;" width="20%">
              <img src="upload/usernoimage.png" style="border-radius: 50%;height: 80px;width: 80px">
            </td>
            <td style="text-align: center;padding-left: 10px;" width="50%">
              <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SSB Freelancer Club</h2>
              <h3 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sherpur, Bogura</h3>
              <h4 style="padding-top: 3px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile : 01712411894</h4>
            </td>
            <td style="text-align: right;" width="30%">
               <div class="card-header" style="">
                <strong></strong>
                <strong> &nbsp;&nbsp;</strong> 
                <br>
                <strong >&nbsp;&nbsp;</strong>
                
              </div> 
            </td>
          </tr>
        </table>

        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>All Student PDF Report</i></u></div>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br> 

            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm" border="1">
                 <thead>
                   <tr style="background-color: lightgreen;color: white">
                    <th>SL</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Session</th>
                    <th>Roll</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Image</th>
                   
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $key => $user)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user['class_name']['class_name']}}</td>
                      <td style="text-align: center;">{{$user['section_name']['section_name']}}</td>
                      <td style="text-align: center;">{{$user['session_year']['session_year']}}</td>
                      <td style="text-align: center;">{{$user->class_roll}}</td>
                      <td style="text-align: center;">{{$user->email}}</td>
                      <td style="text-align: center;">{{$user->mobile}}</td>
                      <td><img style="width: 50px;height: 60px" class="profile-user-img img-fluid img-circle"
                       src="{{(!empty($user->image))?url('upload/userimage/'.$user->image):url('upload/usernoimage.png')}}"
                       alt="User profile picture"></td>
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table> 
               
                
              


                 @php
                $date = new DateTime('now',new DateTimeZone('Asia/Dhaka'))
                @endphp
                
                <i style="font-size: 12px;margin-top: -10px">Print Date: {{$date->format('j F, Y, g:i a')}}</i>
                <br>
                 <br>
                 <br>
            <table width="100%">
          <tr>
            <td width="25%"></td>
            <td style="text-align: center;" width="50%"></td>
            <td style="text-align: center;border-top: solid 1px;" width="25%">Principal Signature</td>
          </tr>
        </table>
                

                </div>
              </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
          </section>
          <!-- right col -->
        </div>
 
   
  </body>
</html>