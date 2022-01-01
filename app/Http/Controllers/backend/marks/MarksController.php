<?php

namespace App\Http\Controllers\backend\marks;

use App\GradePoint;
use App\Http\Controllers\Controller;
use App\model\admin\ExamType;

use App\model\admin\studentClass;
use App\model\admin\Year;
use App\model\student\StudentMarks;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class MarksController extends Controller
{
    public function add(){

        $data["class"]= studentClass::all();
        $data["year"]= Year::all();
        $data["exam_type"]=ExamType::all();
        return view("backend.marks.add-marks",$data);

    }
    public function stor(Request $request){
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
            return redirect()->back()->with("success","Marks inserted Successfully");



        }else{
            return redirect()->back()->with("success","Marks not inserted Successfully");

        }
    }

    public function edit(){
        $data["class"]= studentClass::all();
        $data["year"]= Year::all();
        $data["exam_type"]=ExamType::all();
        return view("backend.marks.edit-marks",$data);

    }

    public function view_grade_point(){
        $data= GradePoint::all();

        return view("backend.grade-marks.view-grade-marks",compact("data"));


    }
    public function add_grade_point(Request $request){
        return view("backend.grade-marks.add-grade-marks");


    }
    public function insert_grade_point(Request $request){
        $data= new GradePoint();
        $data->grade_name= $request->grade_name;
        $data->grade_point= $request->grade_point;
        $data->start_marks= $request->start_marks;
        $data->end_marks= $request->end_marks;
        $data->start_point= $request->start_point;
        $data->end_point= $request->end_point;
        $data->remarks= $request->remarks;
        $data->save();
        return redirect()->route("view.grade.point")->with("success","Data inserted Successfully");

    }
    public function edit_grade_point($id){
        $edit_data= GradePoint::find($id);
        return view("backend.grade-marks.add-grade-marks",compact("edit_data"));

    }
    public function update_grade_point(Request $request,$id){
        $data= GradePoint::find($id);
        $data->grade_name= $request->grade_name;
        $data->grade_point= $request->grade_point;
        $data->start_marks= $request->start_marks;
        $data->end_marks= $request->end_marks;
        $data->start_point= $request->start_point;
        $data->end_point= $request->end_point;
        $data->remarks= $request->remarks;
        $data->save();
        return redirect()->route("view.grade.point")->with("success","Data updated Successfully");


    }

}
