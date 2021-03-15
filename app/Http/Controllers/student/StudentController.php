<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Model\Role;
use Auth;
use Hash;
use App\Models\ClassName;
use App\Models\Group;
use App\Models\Section;
use App\Models\Session;
use App\Models\IssueBook;
use App\Models\Book;
use App\Models\Category;
use PDF;
class StudentController extends Controller
{

	public function view(){
     $users = User::where('role_id','2')->get();
     
        return view('backend.student.student-view',compact('users'));
    }

    public function viewpdf(){
     $data['users'] = User::where('role_id','2')->get();
     $pdf = PDF::loadView('backend.student.student-view-pdf',$data);
     $pdf->SetProtection(['copy','print'],'','pass');
     return $pdf->stream('all-student-report.pdf');
        
    }

    public function showbook(){
        $data['books'] = Book::where('quantity','>','0')->where('status','1')->latest()->get();
        $data['categories']= Category::all();
        return view('user.showbook.show-book-view',$data);
    }

    // Profile part
    public function profileview(){
    $id = Auth::user()->id; 
    $user = User::find($id);
    
    return view('user.profile.student-profile-view',compact('user'));
    }

   


    // Profile Part end

     public function add(){
     $roles = Role::get();
     	$data['roles'] = Role::get();
     	$data['classess'] = ClassName::all();
     	$data['groups'] = Group::all();
     	$data['sections'] = Section::all();
     	$data['sessions'] = Session::all();
    	return view('user.admission.add-user',$data);
    }
    
     public function store(Request $request){

        // $this->validate($request,[
        //     'name'=>'required',
        //     'email'=>'required|unique:users,email',
        //     'class_id'=>'required',
        //     'section_id'=>'required',
        //     'session_id'=>'required',
        //     'group_id'=>'required',
        //     'mobile'=>'required',
        //     'class_roll'=>'required',
        //     'password'=>'required', 'string', 'min:8', 'confirmed',

        // ]);
       
        $code = rand(000000,999999);
    	$data = new User();
      $data->name = $request->name;
    	$data->email = $request->email;
    	$data->mobile = $request->mobile;
    	$data->class_id = $request->class_id;
    	$data->group_id = $request->group_id;
    	$data->section_id = $request->section_id;
    	$data->session_id = $request->session_id;
    	$data->class_roll = $request->class_roll;
      $data->password = Hash::make($request->password);
    	$data->code = $code;
      $data->student_id = $code;
    	$data->save();

    	return redirect()->route('students.add')->with('success','Registration Successfully-- Plese Login!!');
    }


      public function profileedit(){
    $id = Auth::user()->id; 
    $data['editdata'] = User::find($id);
    $data['classess'] = ClassName::all();
    $data['groups'] = Group::all();
    $data['sections'] = Section::all();
    $data['sessions'] = Session::all();
    
    return view('user.profile.student-profile-edit',$data);
    }

     public function profileupdate(Request $request){
         $data = User::find(Auth::user()->id);
       
        $data->name = $request->name;
        $data->class_id = $request->class_id;
        $data->group_id = $request->group_id;
        $data->section_id = $request->section_id;
        $data->session_id = $request->session_id;
        $data->class_roll = $request->class_roll;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address= $request->address;
        $data->gender = $request->gender;
        $data->dob= $request->dob;
        $data->religion = $request->religion;
        

        if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('upload/userimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('upload/userimage'), $filename);
          $data['image'] = $filename;
        }
        $data->save();
      return redirect()->route('stprofiles.profile-view')->with('success','Profile Updated Successfully');

        }


         public function passwordchange(){

        return view('user.profile.profile-edit-password');

}

         public function passwordupdate(Request $request){

          $id = Auth::user()->id;
          $db_pass = Auth::user()->password;
          $old_pass = $request->old_password;
          $new_pass = $request->new_password;
          $confirm_pass = $request->confirm_password;

          if(Hash::check($old_pass, $db_pass)){
            if($new_pass === $confirm_pass){

                User::find($id)->update([
                  'password' => Hash::make($request->new_password)
                ]);

                Auth::logout();
                return redirect()->route('login');
            }else{
               return redirect()->back()->with('error','New Password and Confirm Password Does Not Match!');
            }

          }else{

            return redirect()->back()->with('error','Your Current Password Does Not Match!');
          }
    }



    public function inactive($id){
            $student = User::find($id);
            $student->status = 0;
            $student->save();

          return redirect()->route('students.view')->with('success','Student Inactive Successfully');

        }

public function active($id){
            $student = User::find($id);
            $student->status = 1;
            $student->save();

         return redirect()->route('students.view')->with('success','Student Active Successfully');
        }

          public function studetnwisesearch(Request $request){
      $data['allstudents'] = User::where('role_id','2')->get();
      $data['users'] = User::where('role_id','3' or '2')->get();
      return view('backend.student.student-search',$data);
    }

     public function datewisesearch(Request $request){
     
      $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['allbooks'] = IssueBook::whereBetween('issue_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.student.date-wise-search',$data);
      
    }


    public function datewisedetails(Request $request){
        $sdate = date('y-m-d',strtotime($request->start_date));
        $edate = date('y-m-d',strtotime($request->end_date));
        $data['allbooks'] = IssueBook::whereBetween('issue_date',[$sdate,$edate])->where('status','1')->get();
        $data['start_date'] =date('y-m-d',strtotime($request->start_date));
        $data['end_date'] =date('y-m-d',strtotime($request->end_date));
        return view('backend.student.date-wise-search',$data);

     }


        public function studetnwisebook(Request $request){
      $data['allbooks'] = IssueBook::where('st_id',$request->student_id)->get();
       $data['student'] = User::where('id',$request->student_id)->get();
      return view('backend.student.student-allbook',$data);
      
    }


     public function bookissueview(){
     if(Auth::check()){
            $issuebooks = IssueBook::where('st_id',Auth::id())->latest()->get();
       
         return view('user.bookissue.st-view-issuebook',compact('issuebooks'));
        }else{
            return redirect()->route('login')->with('loginerror','At First Login Your Account');

        }
    }


    public function bookissueadd(){
        $books = Book::where('status','1')->where('quantity','>',0)->orderby('book_name','asc')->get();
        $categories = Category::orderby('category_name','asc')->get();
      return view('user.bookissue.st-add-issuebook',compact('books','categories'));
    }
    
     public function bookissuestore(Request $request){

     // $this->validate($request,[
     //        'book_id'=>'required',
     //        'st_id' =>'required',
     //        'issue_date' =>'required',
     //        'issue_quantity' =>'required'

     //    ]);

      $data = new IssueBook();
      $data->book_id = $request->book_id;
        $data->issue_date = $request->issue_date;
        $data->limit_date = $request->limit_date;
        $data->return_date = $request->return_date;
        $data->issue_quantity = $request->issue_quantity;
        $data->st_id = Auth::user()->id;
        $data->category_id = $request->category_id;
        $data->created_by = Auth::user()->id;
      $data->save();

      return redirect()->route('students.allbook-issue-view')->with('success','Book Issue Inserted Successfully');
    }


    public function bookissueedit($id){
            $data['editdata'] = IssueBook::find($id);
            $data['books'] = Book::orderby('book_name','asc')->get();
             $data['categories'] = Category::orderby('category_name','asc')->get();
            return view('user.bookissue.st-add-issuebook',$data);

        }

        public function bookissueupdate(Request $request,$id){
            $data = IssueBook::find($id);
             
        //      $this->validate($request,[
        //     'book_id'=>'required',
        //     'st_id' =>'required',
        //     'issue_date' =>'required',
        //     'issue_quantity' =>'required'

        
        // ]);

        $data->book_id = $request->book_id;
        $data->issue_date = $request->issue_date;
        $data->limit_date = $request->limit_date;
        $data->return_date = $request->return_date;
        $data->issue_quantity = $request->issue_quantity;
        $data->st_id = Auth::user()->id;
        $data->category_id = $request->category_id;
        $data->updated_by = Auth::user()->id;

        $data->save();

    return redirect()->route('students.allbook-issue-view')->with('success','Book Issue Updated Successfully');

    }
}


