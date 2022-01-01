<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use App\model\admin\Group;
use App\model\admin\Shift;
use App\model\admin\studentClass;
use App\model\admin\Year;
use App\model\student\AssignStudent;
use App\model\student\StudentDiscount;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Class_;

class StudentController extends Controller
{
    public function view(){
        $data= AssignStudent::orderBy("id","desc")->get();
        $year= Year::orderBy("id","desc")->get();
        $year_id = Year::orderBy("id","desc")->first()->id;
        $class_id = studentClass::orderBy("id","asc")->first()->id;
        //dd($year_id,$class_id);
        $all_data = AssignStudent::where("year_id",$year_id)->where("class_id",$class_id)->get();

        $class = studentClass::all();
        return view("backend.student.assign-student.view-student",compact("data","year","class","year_id","class_id","all_data",));
    }
    public function search_student(Request $request){
        $data= AssignStudent::orderBy("id","desc")->get();
        $year= Year::orderBy("id","desc")->get();
        $year_id = $request->year;
        $class_id = $request->class;
        //dd($year_id,$class_id);
        $all_data = AssignStudent::where("year_id",$year_id)->where("class_id",$class_id)->get();

        $class = studentClass::all();
        return view("backend.student.assign-student.view-student",compact("data","year","class","year_id","class_id","all_data",));
    }


    public function add(){
        $group= Group::all();
        $class= studentClass::all();
        $year= Year::orderBy("id","desc")->get();
        $shift= Shift::all();

        return view("backend.student.assign-student.add-student",compact("group","class","year","shift"));
    }
    public function insert(Request $request){


        DB::transaction(function () use ($request) {



            $checkYear = Year::find($request->year)->name;
            $student = User::where("user_type","student")->orderBy("id","DESC")->first();
            $imageName= "";

            if($student==NULL){
                $firstregi = 0;
                $student_id =$firstregi+1;
                if($student_id  < 10){
                    $id_no = "000".$student_id ;
                }elseif($student_id  < 100){
                    $id_no = "00".$student_id ;
                }elseif($student_id  < 1000){
                    $id_no = "0".$student_id ;
                }
            }else{
                $student = User::where("user_type","student")->orderBy("id","DESC")->first()->id;
                $student_id =$student+1;
                if($student_id  < 10){
                    $id_no = "000".$student_id ;
                }elseif($student_id  < 100){
                    $id_no = "00".$student_id ;
                }elseif($student_id  < 1000){
                    $id_no = "0".$student_id ;
                }

            }



            // if($request->images){
            //     $imageName = time() .".". $request->images->extension();
            //     $request->images->move(public_path("upload"),$imageName);

            // }


            $final_id = $checkYear.$id_no;
            $user = new User();
            $code = rand(0000,9999);
            $user->name = $request->student_name;
            if ($request->file("images")) {

                $file = $request->file("images");
                $fine_name = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path("upload/student-images/"), $fine_name);
                $src= "upload/student-images/".$fine_name;
                $user->image = $src;
            }

        //     $image_one = $request->file("images");
        // $name_gen = hexdec(uniqid()).".".$image_one->getClientOriginalExtension();
        // Image::make($image_one)->resize(270,270)->save("upload/student-images/".$name_gen);
        // $image_url_one= "upload/student-images/".$name_gen;

            $user->user_type = "student";
            $user->id_no = $final_id;

            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->phone;
            $user->addres = $request->addres;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->code = "mpa".$code;
            $user->password = bcrypt("mpa".$code);
            $user->save();


            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->class_id = $request->class;
            $assign_student->year_id = $request->year;
            $assign_student->group_id = $request->group;
            $assign_student->shift_id = $request->shift;
            $assign_student->save();



            $discount = new StudentDiscount();
            $discount->assign_student_id = $assign_student->id;
            $discount->fee_category_id = "1";
            $discount->discount= $request->discount;
            $discount->save();



        });



       return  redirect()->back()->with("success","Data inserted succesfully");

    }
    public function edit($student_id){
        $group= Group::all();
        $class= studentClass::all();
        $year= Year::all();
        $shift= Shift::all();
        $edit_data =AssignStudent::with("user","discount")->where("student_id",$student_id)->first();


      return view("backend.student.assign-student.add-student",compact("group","class","year","shift","edit_data"));

    }
    public function update(Request $request,$student_id){


        DB::transaction(function () use ($request,$student_id) {









            // if($request->images){
            //     $imageName = time() .".". $request->images->extension();
            //     $request->images->move(public_path("upload"),$imageName);

            // }



            $user = User::where("id",$student_id)->first();
            $user->name = $request->student_name;

            if ($request->file("images")) {

                $file = $request->file("images");
                @unlink($user->image);
                $fine_name = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path("upload/student-images/"), $fine_name);
                $src = "upload/student-images/".$fine_name;

                $user->image = $src;


            }


            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->phone;
            $user->addres = $request->addres;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->save();


            $assign_student = AssignStudent::where("student_id",$student_id)->first();


            $assign_student->class_id = $request->class;
            $assign_student->year_id = $request->year;
            $assign_student->group_id = $request->group;
            $assign_student->shift_id = $request->shift;
            $assign_student->save();



            $discount =  StudentDiscount::where("assign_student_id",$request->id)->first();
            $discount->discount = $request->discount;
            $discount->save();



        });

        return  redirect()->back()->with("success","Data inserted succesfully");

    }



    public function promotion_student($student_id){
        $group= Group::all();
        $class= studentClass::all();
        $year= Year::all();
        $shift= Shift::all();


        $edit_data =AssignStudent::with("user","discount")->where("student_id",$student_id)->first();


      return view("backend.student.assign-student.promot-student",compact("group","class","year","shift","edit_data"));

    }
    public function promote_student(Request $request,$student_id){


        DB::transaction(function () use ($request,$student_id) {

            $user = User::where("id",$student_id)->first();
            $user->name = $request->student_name;
            if ($request->file("images")) {
                $file = $request->file("images");
                @unlink($user->image);
                $fine_name = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path("upload/student-images/"), $fine_name);
                $src = "upload/student-images/".$fine_name;
                $user->image = $src;
            }
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->phone;
            $user->addres = $request->addres;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->save();
            $assign_student = new  AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->class_id = $request->class;
            $assign_student->year_id = $request->year;
            $assign_student->group_id = $request->group;
            $assign_student->shift_id = $request->shift;
            $assign_student->save();
            $discount = new StudentDiscount();
            $discount->assign_student_id = $assign_student->id;
            $discount->fee_category_id = "1";
            $discount->discount = $request->discount;
            $discount->save();
        });

        return  redirect()->back()->with("success","Student Promotion succesfully");


    }

    public function details_student($student_id){
        $student= AssignStudent::where("student_id",$student_id)->first();

      return view("backend.student.assign-student.details-student",compact("student"));



    }
}
