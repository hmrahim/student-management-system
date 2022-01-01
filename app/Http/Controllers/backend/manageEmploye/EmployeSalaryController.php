<?php

namespace App\Http\Controllers\backend\manageEmploye;

use App\Employe_salary_logs;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeSalaryController extends Controller
{
    public function view(){
        $employe = User::where("user_type","employe")->get();
            return view("backend.employe-salary.view-employe-salary",compact("employe"));
        }


        public function add($id){
            $data= User::find($id);


            return view("backend.employe-salary.add-employe-salary",compact("data"));
        }
        public function insert(Request $request,$id){


            DB::transaction(function () use ($request,$id) {
              $user= User::find($id);
              $previousSalary = $user->sellery;
              $presentSalary =(float)$previousSalary+$request->salary_increment;
              $user->sellery=$presentSalary;
              $user->save();
              $employe_salary_log = new Employe_salary_logs();
              $employe_salary_log->employe_id= $id;
              $employe_salary_log->previous_salary= $previousSalary;
              $employe_salary_log->present_salary= $presentSalary;
              $employe_salary_log->increment_salary= $request->salary_increment;
              $employe_salary_log->effected_date= date("Y-m-d",strtotime($request->effected_date));
              $employe_salary_log->save();



            });




           return  redirect()->back()->with("success","Salary incrimented succesfully");

        }

        public function view_salary_details($id){
            $details = User::find($id);
            $selaray_details= Employe_salary_logs::where("employe_id","$id")->get();
            return view("backend.employe-salary.view-salary-details",compact("details","selaray_details"));


        }

}
