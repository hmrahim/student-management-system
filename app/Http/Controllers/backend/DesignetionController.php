<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Designetion;
use Illuminate\Http\Request;

class DesignetionController extends Controller
{

    public function view(){
        $data= Designetion::all();
        return view("backend.designetion.view-designetion",compact("data"));
    }
    public function add(){

        return view("backend.designetion.add-designetion");
    }
    public function insert(Request $request){
        $data= new Designetion();
        $request->validate([
            "name" => "required|unique:designetions,name"
        ]);
        $data->name= $request->name;
        $data->save();


       return  redirect()->route("view_designetion")->with("success","Data inserted succesfully");

    }
    public function edit($id){
        $edit_data=Designetion::find($id);

        return view("backend.designetion.add-designetion",compact("edit_data",));

    }
    public function update(Request $request,$id){


        $request->validate([
            "name" => "required|unique:designetions,name"
        ]);
        $data= Designetion::find($id);
        $data->name= $request->name;
        $data->save();

       return  redirect()->route("view_designetion")->with("success","Data updated succesfully");


    }
    public function delete($id){
        $data= Designetion::find($id);
        $data->delete();
        return  redirect()->route("view_designetion")->with("success","Data Deleted succesfully");




    }
}
