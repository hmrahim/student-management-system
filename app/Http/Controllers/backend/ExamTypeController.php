<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    public function view_exam_type(){
        $data= ExamType::get();
        return view("backend.exam-type.view-exam-type",compact("data"));
    }
    public function add_exam_type(){
        return view("backend.exam-type.add-exam-type");
    }
    public function insert_data(Request $request){
        $data= new ExamType();
        $request->validate([
            "name" => "required|unique:exam_types,name"
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_exam_type")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= ExamType::find($id);
        return view("backend.exam-type.add-exam-type",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = ExamType::find($id);

        $request->validate([
            "name" => "required|unique:exam_types,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_exam_type")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= ExamType::find($id);
        $data->delete();
        return  redirect()->route("view_exam_type")->with("success","Data deleted succesfully");



    }
}
