<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function view_subject(){
        $data= Subject::get();
        return view("backend.subject.view-subject",compact("data"));
    }
    public function add_subject(){
        return view("backend.subject.add-subject");
    }
    public function insert_data(Request $request){
        $data= new Subject();
        $request->validate([
            "name" => "required|unique:subjects,name"
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_subjects")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= Subject::find($id);
        return view("backend.subject.add-subject",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = Subject::find($id);

        $request->validate([
            "name" => "required|unique:subjects,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_subjects")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= Subject::find($id);
        $data->delete();
        return  redirect()->route("view_subjects")->with("success","Data deleted succesfully");



    }
}
