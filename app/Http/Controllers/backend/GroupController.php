<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function view_group(){
        $group= Group::get();
        return view("backend.group.view-group",compact("group"));
    }
    public function add_group(){
        return view("backend.group.add-group");
    }
    public function insert_data(Request $request){
        $group= new Group();
        $request->validate([
            "name" => "required|unique:groups,name"
        ]);

        $group->name= $request->name;
        $group->save();
       return  redirect()->route("view_group")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= Group::find($id);
        return view("backend.group.add-group",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = Group::find($id);

        $request->validate([
            "name" => "required|unique:groups,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_group")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= Group::find($id);
        $data->delete();
        return  redirect()->route("view_group")->with("success","Data deleted succesfully");



    }
}
