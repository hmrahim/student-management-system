<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use App\model\admin\studentClass;
use App\model\admin\Year;
use App\model\student\AssignStudent;
use Illuminate\Http\Request;

class RollGenaraeController extends Controller
{
    public function roll_genarate(){

        $year= Year::orderBy("id","desc")->get();

        $class = studentClass::all();

        return view("backend.student.assign-student.rollgenarate",compact("year","class",));
    }

    public function get_student(Request $request){

        $get_data = AssignStudent::with("user","class_name")->where("year_id",$request->year_id)->where("class_id",$request->class_id)->get();
       return response()->json($get_data);

    }
    public function insert_roll(Request $request){
       if ($request->student_id != NULL) {
           for ($i=0; $i < count($request->student_id) ; $i++) {
            AssignStudent::where("class_id",$request->class_id)->where("year_id",$request->year_id)->where("student_id",$request->student_id[$i])->update([
                "roll" => $request->roll[$i]
            ] );

           }
           return  redirect()->back()->with("success","Roll Genarated succesfully");
       }else{
        return  redirect()->back()->with("error","Sorry there are no student");
       }


    }

}
