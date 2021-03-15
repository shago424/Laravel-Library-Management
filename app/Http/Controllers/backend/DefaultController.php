<?php 

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;  
use DB; 
use App\Models\User;
use Session;
use App\Models\Book;
use App\Models\Category;
use App\Models\IssueBook;


class DefaultController extends Controller
{
   

     public function getbook(Request $request){
     $category_id = $request->category_id;
     $allbook = Book::where('status','1')->where('quantity','>',0)->where('category_id',$category_id)->get();
     return response()->json($allbook);
   }



   // Get All Students

    public function getmodel(Request $request){
     $product_id = $request->product_id;
     $allmodel = Product::where('id',$product_id)->first()->model;
     return response()->json($allmodel);
   } 

   public function getsize(Request $request){
     $product_id = $request->product_id;
     $allsize = Product::where('id',$product_id)->first()->size;
     return response()->json($allsize);

   } 

   public function getcolor(Request $request){
     $product_id = $request->product_id;
     $allsize = Product::where('id',$product_id)->first()->color;
     return response()->json($allsize);
   } 

    public function getproductcode(Request $request){
     $product_id = $request->product_id;
     $productcode = Product::where('id',$product_id)->first()->product_code;
     return response()->json($productcode);
   } 

    public function getclassroll(Request $request){
     $st_id = $request->st_id;
     $classroll =User::where('id',$st_id)->first()->class_roll;
     return response()->json($classroll);
   } 


// end Student 

    public function getcategory(Request $request){
     $supplier_id = $request->supplier_id;
     $allcategory = Product::with(['category'])->select('category_id')->where('supplier_id',$supplier_id)->groupBy('category_id')->get();
     return response()->json($allcategory);

   }

    public function subgetcategory(Request $request){
     $category_id = $request->category_id;
     $allsubcategory = Product::with(['subcategory'])->select('sub_category_id')->where('category_id',$category_id)->groupBy('sub_category_id')->get();
     return response()->json($allsubcategory);

   }

    public function subsubgetcategory(Request $request){
     $sub_category_id = $request->sub_category_id;
     $allsubsubcategory = Product::with(['subsubcategory'])->select('sub_sub_category_id')->where('sub_category_id',$sub_category_id)->groupBy('sub_sub_category_id')->get();
     return response()->json($allsubsubcategory);

   }

   public function getbrand(Request $request){
     $sub_sub_category_id = $request->sub_sub_category_id;
     $allbrand = Product::with(['brand'])->select('brand_id')->where('sub_sub_category_id',$sub_sub_category_id)->groupBy('brand_id')->get();
     return response()->json($allbrand);

   }


    public function getproductname(Request $request){
     $brand_id = $request->brand_id;
     $allproductname = Product::where('brand_id',$brand_id)->get();
     return response()->json($allproductname);
   }

   public function getproduct(Request $request){
     $category_id = $request->category_id;
     $productname = Product::where('category_id',$category_id)->get();
     return response()->json($productname);
   }

   public function getsession(Request $request){
     $st_id = $request->st_id;
     $session = User::with(['session_year'])->select('session_id')->where('id',$st_id)->first()->session_id;
     return response()->json($session);
   }

    public function getsection(Request $request){
     $st_id = $request->st_id;
     $section = User::with(['section_name'])->select('section_id')->where('id',$st_id)->first()->section_id;
     return response()->json($section);
   }


    public function getgroup(Request $request){
     $st_id = $request->st_id;
     $group = User::with(['group_name'])->select('group_id')->where('id',$st_id)->first()->group_id;
     return response()->json($group);
   }

 public function getclass(Request $request){
     $st_id = $request->st_id;
     $allclass = User::with(['class_name'])->select('class_id')->where('id',$st_id)->first()->class_id;
     return response()->json($allclass);
   } 

 public function getpublication(Request $request){
     $book_id = $request->book_id;
     $publication = Book::where('id',$book_id)->first()->publication;
     return response()->json($publication);
   } 
  
 public function getauhtor(Request $request){
     $book_id = $request->book_id;
     $author = Book::where('id',$book_id)->first()->author_name;
     return response()->json($author);
   } 


   public function getstock(Request $request){
     $book_id = $request->book_id;
     $stock = Book::where('id',$book_id)->first()->quantity;
     return response()->json($stock);
   } 

}
