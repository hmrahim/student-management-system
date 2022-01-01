<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\AssignSubject;
use App\model\admin\studentClass;
use App\model\admin\Subject;
use App\User;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{

    public function view(){
        $data= AssignSubject::select("class_id")->groupBy('class_id')->get();
        return view("backend.assign-subject.view-assign-subject",compact("data"));
    }
    public function add(){
        $class = studentClass::all();
        $subject = Subject::all();
        return view("backend.assign-subject.add-assign-subject",compact("class","subject"));
    }
    public function insert(Request $request){

        $assign= count($request->subject);
        if ($assign != NULL) {
           for ($i=0; $i <$assign ; $i++) {
            $data= new AssignSubject();
               $data->class_id= $request->class;
               $data->subject_id = $request->subject[$i];
               $data->full_mark= $request->full_mark[$i];
               $data->pass_mark= $request->pass_mark[$i];
               $data->subjective_mark= $request->subjective_mark[$i];
               $data->save();
           }
        }



       return  redirect()->route("view_assign_subject")->with("success","Data inserted succesfully");

    }
    public function edit($class_id){
        $edit_data= AssignSubject::where("class_id",$class_id)->get();
        $class = studentClass::all();
        $subject = Subject::all();
        return view("backend.assign-subject.edit-assign-subject",compact("edit_data","class","subject",));

    }
    public function update(Request $request,$class_id){


        $request->validate([
            "subject" => "required"
        ]);
        AssignSubject::where("class_id",$class_id)->delete();
        
        $assign= count($request->subject);
        if ($assign != NULL) {
           for ($i=0; $i <$assign ; $i++) {
            $data= new AssignSubject();
               $data->class_id= $request->class;
               $data->subject_id = $request->subject[$i];
               $data->full_mark= $request->full_mark[$i];
               $data->pass_mark= $request->pass_mark[$i];
               $data->subjective_mark= $request->subjective_mark[$i];
               $data->save();
           }
        }



       return  redirect()->route("view_assign_subject")->with("success","Data updated succesfully");


    }
    public function details($class_id){
        $data = AssignSubject::where("class_id",$class_id)->get();
        return view("backend.assign-subject.details-assign-subject",compact("data"));


    }
}
