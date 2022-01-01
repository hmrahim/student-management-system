<?php

namespace App\Http\Controllers\backend\marks;

use App\Http\Controllers\Controller;
use App\model\admin\AssignSubject;
use App\model\student\AssignStudent;
use App\model\student\StudentMarks;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function get_subject(Request $request){
       $subject = AssignSubject::with("subject_name")->where("class_id","$request->class_id")->get();
       return response()->json($subject);


    }
    public function get_student(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
       $allData = AssignStudent::with("user","class_name","marks")->where("class_id",$class_id)->where("year_id",$year_id)->get();
       return response()->json($allData);




    }
    public function get_edit_data(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $subject_id = $request->subject;
        $exam_type_id = $request->exam_type;

       $allData = StudentMarks::with("user","class_name")->where("class_id",$class_id)->where("year_id",$year_id)->where("assign_subject_id",$subject_id)->where("exam_type_id",$exam_type_id)->get();
       return response()->json($allData);



    }
    public function update(Request $request){
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $subject_id = $request->subject;
        $exam_type_id = $request->exam_type;
        $allData = StudentMarks::with("user","class_name")->where("class_id",$class_id)->where("year_id",$year_id)->where("assign_subject_id",$subject_id)->where("exam_type_id",$exam_type_id)->delete();
        if ($request->student_id != NULL ) {
            $count = Count($request->student_id);
            for ($i=0; $i < $count; $i++) {
                $marks = new StudentMarks();
                $marks->student_id= $request->student_id[$i];
                $marks->id_no= $request->id_no[$i];
                $marks->year_id= $request->year_id;
                $marks->class_id= $request->class_id;
                $marks->assign_subject_id= $request->subject;
                $marks->exam_type_id= $request->exam_type;
                $marks->marks= $request->marks[$i];
                $marks->save();



            }
            return redirect()->back()->with("success","Marks updated ");



        }else{
            return redirect()->back()->with("success","Marks not updated ");

        }


    }
}

