<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\studentClass;
use Illuminate\Http\Request;

class studentClassController extends Controller
{
    public function add_class(){
        return view("backend.student-class.add-class");
    }
    public function insert_data(Request $request){
        $request->validate([
            "name" => "required|unique:student_classes,name"
        ]);
    $class= new studentClass();

        $class->name= $request->name;
        $class->save();
        return redirect()->route("view_class")->with("success","Data Added Successfully");

    }

    public function view_class(){
        $class= studentClass::orderBy("id","DESC")->get();
        return view("backend.student-class.view-class",compact("class"));

    }

    function delete_class_data($id){
        $delete= studentClass::find($id);


        $delete->delete();

        return redirect()->back()->with("success","Data delete Successfully");

    }

    public function edit_class_data($id){
       $edit_data= studentClass::find($id);
       return view("backend.student-class.add-class",compact("edit_data"));

    }

    public function update_class_data(Request $request,$id){
        $data= studentClass::find($id);
        $request->validate([
            "name" => "required|unique:student_classes,name,".$data->id
        ]);


        $data->name= $request->name;
        $data->save();
        return redirect()->back()->with("success","Data Updated Successfully");


    }
}
