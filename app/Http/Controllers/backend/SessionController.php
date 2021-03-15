<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    public function view(){
    	$data['alldata'] = Session::all();
    	
    return view('backend.session.view-session',$data);
    }
    
    public function add(){

    	return view('backend.session.view-session');
    }
    
     public function store(Request $request){

        $this->validate($request,[
            'session_year'=>'required|unique:sessions,session_year'

        ]);

    	$data = new Session();
    	$data->session_year = $request->session_year;
    	$data->save();

    	return redirect()->route('setups.session-view')->with('success','Data Inserted Successfully');
    }
        
        public function edit($id){
        	$data['alldata'] = Session::all();
            $data['editdata'] = Session::find($id);
            return view('backend.session.view-session',$data);

        }

        public function update(Request $request,$id){
            $data = Session::find($id);
             $this->validate($request,[
            'session_year'=>'required|unique:sessions,session_year,'.$data->id
        ]);
        $data->session_year = $request->session_year;
        $data->save();

    return redirect()->route('setups.session-view')->with('success','Data Updated Successfully');

    }

          public function delete(Request $request){
            $data = Session::find($request->id); 
             $data->delete();
            return redirect()->route('setups.session-view')->with('success','Data Deleted Successfully');


     }  

}
