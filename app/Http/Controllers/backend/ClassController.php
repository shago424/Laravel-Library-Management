<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassName;


class ClassController extends Controller
{
   public function view(){
    	$data['alldata'] = ClassName::all();
    	
    return view('backend.class.view-class',$data);
    }
    
    public function add(){

    	return view('backend.class.add-class');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'class_name'=>'required|unique:class_names,class_name'

        ]);

    	$data = new ClassName();
    	$data->class_name = $request->class_name;
    	$data->save();

    	return redirect()->route('setups.class-view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
        	$data['alldata'] = ClassName::all();
            $data['editdata'] = ClassName::find($id);
            return view('backend.class.view-class',$data);

        }

        public function update(Request $request,$id){
            $data = ClassName::find($id);
             $this->validate($request,[
            'class_name'=>'required|unique:class_names,class_name,'.$data->id
        ]);
        $data->class_name = $request->class_name;
        $data->save();

    return redirect()->route('setups.class-view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = ClassName::find($request->id); 
             $data->delete();
            return redirect()->route('setups.class-view')->with('success','Data Deleted Successfully');


     }  

}
