<?php

namespace App\Http\Controllers\backend\manageEmploye;

use App\Employe_salary_logs;
use App\Http\Controllers\Controller;
use App\model\admin\Designetion;
use App\model\admin\Group;
use App\model\admin\studentClass;
use App\model\admin\Year;
use App\model\student\AssignStudent;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class EmployeController extends Controller
{
    public function view(){
    $employe = User::where("user_type","employe")->get();
        return view("backend.employe.view-employe",compact("employe"));
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
        $shift= Designetion::all();

        return view("backend.employe.add-employe",compact("group","class","year","shift"));
    }
    public function insert(Request $request){


        DB::transaction(function () use ($request) {



            $checkYear = date("Y",strtotime($request->join_date));

            $employe = User::where("user_type","employe")->orderBy("id","DESC")->first();
            $imageName= "";

            if($employe==NULL){
                $firstregi = 0;
                $employe_id =$firstregi+1;
                if($employe_id  < 10){
                    $id_no = "000".$employe_id ;
                }elseif($employe_id  < 100){
                    $id_no = "00".$employe_id ;
                }elseif($employe_id  < 1000){
                    $id_no = "0".$employe_id ;
                }
            }else{
                $employe = User::where("user_type","employe")->orderBy("id","DESC")->first()->id;
                $employe_id =$employe+1;
                if($employe_id  < 10){
                    $id_no = "000".$employe_id ;
                }elseif($employe_id  < 100){
                    $id_no = "00".$employe_id ;
                }elseif($employe_id  < 1000){
                    $id_no = "0".$employe_id ;
                }

            }



            // if($request->images){
            //     $imageName = time() .".". $request->images->extension();
            //     $request->images->move(public_path("upload"),$imageName);

            // }


            $final_id = $checkYear.$id_no;
            $user = new User();
            $code = rand(000000,999999);
            $user->name = $request->student_name;
            if ($request->file("images")) {

                $file = $request->file("images");
                $fine_name = hexdec(uniqid()).".".$file->getClientOriginalExtension();
                $file->move(public_path("upload/employe-images/"), $fine_name);
                $src= "upload/employe-images/".$fine_name;
                $user->image = $src;
            }

        //     $image_one = $request->file("images");
        // $name_gen = hexdec(uniqid()).".".$image_one->getClientOriginalExtension();
        // Image::make($image_one)->resize(270,270)->save("upload/student-images/".$name_gen);
        // $image_url_one= "upload/student-images/".$name_gen;

            $user->user_type = "employe";
            $user->id_no = $final_id;

            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->mobile = $request->phone;
            $user->addres = $request->addres;
            $user->sellery = $request->salary;
            $user->gender = $request->gender;
            $user->designetion_id = $request->designation;
            $user->religion = $request->religion;
            $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->code = $code;
            $user->password = bcrypt($code);
            $user->save();


            $employe_salary_log = new Employe_salary_logs();
            $employe_salary_log->employe_id = $user->id;
            $employe_salary_log->previous_salary = $request->salary;
            $employe_salary_log->present_salary = $request->salary;
            $employe_salary_log->increment_salary = "0";
            $employe_salary_log->effected_date = date('Y-m-d', strtotime($request->join_date));
            $employe_salary_log->save();

        });



       return  redirect()->back()->with("success","Data inserted succesfully");

    }
    public function edit($id){

        $edit_data =User::find($id);
        $shift= Designetion::all();
        return view("backend.employe.add-employe",compact("edit_data","shift"));
    }
    public function update(Request $request,$id){
        $user = User::find($id);
        $code = rand(000000,999999);
        $user->name = $request->student_name;
        if ($request->file("images")) {

            $file = $request->file("images");
            unlink($user->image);

            $fine_name = hexdec(uniqid()).".".$file->getClientOriginalExtension();
            $file->move(public_path("upload/employe-images/"), $fine_name);
            $src= "upload/employe-images/".$fine_name;
            $user->image = $src;
        }

        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->mobile = $request->phone;
        $user->addres = $request->addres;
        $user->gender = $request->gender;
        $user->designetion_id = $request->designation;
        $user->religion = $request->religion;
        $user->date_of_birth = date('Y-m-d', strtotime($request->date_of_birth));
        $user->join_date = date('Y-m-d', strtotime($request->join_date));

        $user->save();


        return  redirect()->back()->with("success","Data updated succesfully");

    }

    public function details_student($student_id){
        $student= AssignStudent::where("student_id",$student_id)->first();

      return view("backend.student.assign-student.details-student",compact("student"));



    }
}
