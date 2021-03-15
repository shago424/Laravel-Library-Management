<?php

namespace App\Http\Controllers\book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function view(){
    	$data['alldata'] = Category::all();
    return view('backend.category.view-category',$data);
    }
    
    public function add(){

    	return view('backend.category.view-category');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'category_name'=>'required|unique:categories,category_name'

        ]);

    	$data = new Category();
    	$data->category_name = $request->category_name;
    	$data->save();

    	return redirect()->route('books.category-view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
        	$data['alldata'] = Category::all();
            $data['editdata'] = Category::find($id);
            return view('backend.category.view-category',$data);

        }

        public function update(Request $request,$id){
            $data = Category::find($id);
             $this->validate($request,[
            'category_name'=>'required|unique:categories,category_name,'.$data->id
        ]);
        $data->category_name = $request->category_name;
        $data->save();

    return redirect()->route('books.category-view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Category::find($request->id); 
             $data->delete();
            return redirect()->route('books.category-view')->with('success','Data Deleted Successfully');


     }  
}
