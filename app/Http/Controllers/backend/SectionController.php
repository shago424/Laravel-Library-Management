<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    public function view(){
    	$data['alldata'] = Section::all();
    	
    return view('backend.section.view-section',$data);
    }
    
    public function add(){

    	return view('backend.section.add-section');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'section_name'=>'required|unique:sections,section_name'

        ]);

    	$data = new Section();
    	$data->section_name = $request->section_name;
    	$data->save();

    	return redirect()->route('setups.section-view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
        	$data['alldata'] = Section::all();
            $data['editdata'] = Section::find($id);
            return view('backend.section.view-section',$data);

        }

        public function update(Request $request,$id){
            $data = Section::find($id);
             $this->validate($request,[
            'section_name'=>'required|unique:sections,section_name,'.$data->id
        ]);
        $data->section_name = $request->section_name;
        $data->save();

    return redirect()->route('setups.section-view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Section::find($request->id); 
             $data->delete();
            return redirect()->route('setups.section-view')->with('success','Data Deleted Successfully');


     }  
}
