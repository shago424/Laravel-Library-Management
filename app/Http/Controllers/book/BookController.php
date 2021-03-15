<?php
 
namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Auth; 
use App\Models\User;
use App\Models\IssueBook;
use PDF;
class BookController extends Controller
{
    public function view(){
    	$data['books'] = Book::orderby('id','desc')->get();
    return view('backend.book.view-book',$data);
    }

    public function viewpdf(){
    $data['books'] = Book::orderby('id','desc')->get();
    $pdf = PDF::loadView('backend.book.view-book-pdf',$data);
    $pdf->SetProtection(['copy','print'],'','pass');
     return $pdf->stream('all-student-report.pdf');
    
    }
    
    public function add(){
        $categories = Category::orderby('category_name','asc')->get();
    	return view('backend.book.add-book',compact('categories'));
    }
    
     public function store(Request $request){

     $this->validate($request,[
            'book_name'=>'required|unique:books,book_name',
            'category_id' =>'required'
        ]);

    	$data = new Book();
    	$data->book_name = $request->book_name;
      $data->book_title = $request->book_title;
        $data->author_name = $request->author_name;
        $data->publication = $request->publication;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;
        $data->created_by = Auth::user()->id;

       if ($request->file('image')){
          $file = $request->file('image');
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('backend/bookimage'), $filename);
          $data['image'] = $filename;
        }

    	$data->save();

    	return redirect()->route('books.book-add')->with('success','Book Inserted Successfully');
    }
        
        public function edit($id){
            $data['editdata'] = Book::find($id);
             $data['categories'] = Category::orderby('category_name','asc')->get();
            return view('backend.book.add-book',$data);

        }

        public function update(Request $request,$id){
            $data = Book::find($id);
             $this->validate($request,[
            'book_name'=>'required|unique:books,book_name,'.$data->id,
            'author_name'=>'required',
            'category_id'=>'required',
            'publication'=>'required',
            'quantity'=>'required',
        ]);

         $data->book_name = $request->book_name;
          $data->book_title = $request->book_title;
        $data->author_name = $request->author_name;
        $data->publication = $request->publication;
        $data->quantity = $request->quantity;
        $data->category_id = $request->category_id;
        $data->updated_by = Auth::user()->id;

        if ($request->file('image')){
          $file = $request->file('image');
          @unlink(public_path('backend/bookimage/'.$data->image));
          $filename =date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('backend/bookimage'), $filename);
          $data['image'] = $filename;
        }

        $data->save();

    return redirect()->route('books.book-view')->with('success','Book Updated Successfully');

    }

          public function delete(Request $request){
            $data = Book::find($request->id); 
             $data->delete();
            return redirect()->route('books.book-view')->with('success','Book Deleted Successfully');
     }  

     public function inactive($id){
            $book = Book::find($id);
            $book->status = 0;
            $book->save();

          return redirect()->route('books.book-view')->with('success','Book Inactive Successfully');

        }

public function active($id){
            $book = Book::find($id);
            $book->status = 1;
            $book->save();

         return redirect()->route('books.book-view')->with('success','Book Active Successfully');
        }

   public function search(Request $request){
      $search = $request->get('q');
      $data['books'] = Book::where('book_name','like','%'.$search.'%')->get();
        
      return view('user.showbook.show-book-view',$data);
    }


    // public function search(Request $request){
    
    //   if($request->has('q')){
    //     $q=$request->q;
    //     $result = Book::where('book_name','like','%'.$q.'%')->get();
    //     return response()->json(['data'=>$result]);    
    //   }else{
    //      return view('user.showbook.show-book-view');
    //   }
      

    // }

}
