<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
class GroupController extends Controller
{
   public function view(){
    	$data['alldata'] = Group::all();
    	
    return view('backend.group.view-group',$data);
    }
    
    public function add(){

    	return view('backend.group.add-group');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'group_name'=>'required|unique:groups,group_name'

        ]);

    	$data = new Group();
    	$data->group_name = $request->group_name;
    	$data->save();

    	return redirect()->route('setups.group-view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
        	$data['alldata'] = Group::all();
            $data['editdata'] = Group::find($id);
            return view('backend.group.view-group',$data);

        }

        public function update(Request $request,$id){
            $data = Group::find($id);
             $this->validate($request,[
            'group_name'=>'required|unique:groups,group_name,'.$data->id
        ]);
        $data->group_name = $request->group_name;
        $data->save();

    return redirect()->route('setups.group-view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Group::find($request->id); 
             $data->delete();
            return redirect()->route('setups.group-view')->with('success','Data Deleted Successfully');


     }  
}
