<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <link rel="stylesheet" href="{{asset('backend')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
     <link rel="stylesheet" href="{{asset('backend')}}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
 

    <title> All Book PDF Report</title>
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

        <div style="font-size: 18px;margin-top: 7px;font-weight: bold;text-align: center;"><u ><i>All Book PDF Report</i></u></div>
    
    <div class="row">
          <section class="col-md-12">
           
           <div class="card">
             
            <br> 

            <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-sm" border="1">
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
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($books as $key => $book)
            <tr style="background-color: ">
                      <td>{{$key+1}}</td>
                      <td>{{$book->id}}</td>
                      <td >{{$book['user']['name']}}</td>
                      <td>{{$book->book_name}}</td>
                      <td>{{$book['category']['category_name']}}</td>
                      <td>{{$book->author_name}}</td>
                      <td style="text-align: center;">{{$book->quantity}}</td>
                      <td>{{date('d-m-Y',strtotime($book->created_at))}}</td>
                       <td><img style="width: 50px;height: 60px" class="profile-book-img img-fluid img-circle"
                       src="{{(!empty($book->image))?url('backend/bookimage/'.$book->image):url('upload/usernoimage.png')}}"
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