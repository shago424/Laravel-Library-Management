<?php 

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Auth;
use App\Models\User;
use App\Models\IssueBook;
Use DB; 

class IssueBookController extends Controller
{
    public function view(){
    	$data['issuebooks'] = IssueBook::where('status','1')->orderby('id','desc')->get();
    return view('backend.bookissue.view-issuebook',$data);
    }

     public function pendinglist(){
        $data['issuebooks'] = IssueBook::where('status','0')->orderby('id','desc')->get();
    return view('backend.bookissue.pending-list',$data);
    }

    public function returnlist(){
        $data['issuebooks'] = IssueBook::where('back','0')->orderby('id','desc')->get();
    return view('backend.bookissue.return-list',$data);
    }

    public function dateover(){
        $data['issuebooks'] = IssueBook::where('back','0')->where('limit_date','>',date('Y-m-d'))->orderby('id','asc')->get();
    return view('backend.bookissue.date-over',$data);
    }

      public function dateoverreturn(){
        $data['issuebooks'] = IssueBook::where('limit_date','>',date('Y-m-d'))->orderby('id','asc')->get();
    return view('backend.bookissue.date-over-return',$data);
    }
    
    
    public function add(){
        $books = Book::where('status','1')->where('quantity','>',0)->orderby('book_name','asc')->get();
        $categories = Category::orderby('category_name','asc')->get();
        $students = User::where('role_id','2')->where('status','1')->orderby('name','asc')->get();
    	return view('backend.bookissue.add-issuebook',compact('books','students','categories'));
    }
    
     public function store(Request $request){

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
        $data->st_id = $request->st_id;
        $data->category_id = $request->category_id;
        $data->created_by = Auth::user()->id;

     

    	$data->save();

    	return redirect()->route('issuebooks.pending-list')->with('success','Book Issue Inserted Successfully');
    }
        
        public function edit($id){
            $data['editdata'] = IssueBook::find($id);
            $data['books'] = Book::where('quantity','>', 0)->orderby('book_name','asc')->get();
            $data['students'] = User::orderby('name','asc')->get();
             $data['categories'] = Category::orderby('category_name','asc')->get();
            return view('backend.bookissue.add-issuebook',$data);

        }

        public function update(Request $request,$id){
            $data = IssueBook::find($id);
             
             $this->validate($request,[
            'book_id'=>'required',
            'st_id' =>'required',
            'issue_date' =>'required',
            'issue_quantity' =>'required'

        
        ]);

        $data->book_id = $request->book_id;
        $data->issue_date = $request->issue_date;
        $data->limit_date = $request->limit_date;
        $data->return_date = $request->return_date;
        $data->issue_quantity = $request->issue_quantity;
        $data->st_id = $request->st_id;
        $data->category_id = $request->category_id;
        $data->updated_by = Auth::user()->id;

        $data->save();

    return redirect()->route('issuebooks.issue-view')->with('success','Book Issue Updated Successfully');

    }

          public function delete(Request $request){
            $data = IssueBook::find($request->id); 
             $data->delete();
            return redirect()->route('issuebooks.issue-view')->with('success','Book Issue Deleted Successfully');
     }  

     public function inactive($id){
            $book = IssueBook::find($id);
            $book->status = 0;
            $book->save();

          return redirect()->route('issuebooks.issue-view')->with('success','Book Issue Inactive Successfully');

        }

public function active($id){
	     $issuebook = IssueBook::find($id);
        $book = Book::where('id',$issuebook->book_id)->first();
        $issuebook_qty = $book->quantity-$issuebook->issue_quantity;
        $book->quantity = $issuebook_qty;
        if($book->save()){
            DB::table('issue_books')
            ->where('id',$id)
            ->update(['back' => 0]);

            DB::table('issue_books')
            ->where('id',$id)
            ->update(['status' => 1]);

        }
         

         return redirect()->route('issuebooks.issue-view')->with('success','Book Approved Successfully');
        }

        public function return($id){
        $issuebook = IssueBook::find($id);
        $book = Book::where('id',$issuebook->book_id)->first();
        $issuebook_qty = $issuebook->issue_quantity+$book->quantity;
        $book->quantity = $issuebook_qty;
        if($book->save()){
            DB::table('issue_books')
            ->where('id',$id)
            ->update(['back' => '1' ]);

            DB::table('issue_books')
            ->where('id',$id)
            ->update(['return_date' => date('Y-m-d') ]);
        }
         

         return redirect()->route('issuebooks.issue-view')->with('success','Book Return Successfully');
        }
}
