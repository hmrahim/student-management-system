<?php

namespace App\Http\Controllers\backend\manageEmploye;

use App\Employe_salary_logs;
use App\Http\Controllers\Controller;
use App\model\employe\LeaveEmploye;
use App\model\employe\LeavePurpose;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeLeaveController extends Controller
{
    
    public function view(){
        $employe = LeaveEmploye::get();
            return view("backend.employe-leave.view-employe-leave",compact("employe"));
        }


        public function add(){
           
            $leave_purpose = LeavePurpose::all();
            $employe= User::where("user_type","employe")->get();

            return view("backend.employe-leave.add-employe-leave",compact("leave_purpose","employe"));
        }
        public function insert(Request $request){


            DB::transaction(function () use ($request) {
                if ($request->leave_purpose_id==0) {
                   $leavePurpose = new LeavePurpose();
                   $leavePurpose->name= $request->name;
                   $leavePurpose->save();
                   $leave_purpose_id = $leavePurpose->id;

                }else{
                    $leave_purpose_id= $request->leave_purpose_id;

                }
                $leave_employe = new LeaveEmploye();
                $leave_employe->employe_id= $request->employe_id;
                $leave_employe->leave_purpose_id= $leave_purpose_id;
                $leave_employe->start_date=date("Y-m-d",strtotime($request->start_date)) ;
                $leave_employe->end_date= date("Y-m-d",strtotime($request->end_date));
                $leave_employe->save();

            });




           return  redirect()->back()->with("success","Leave Requested succesfully");

        }

        public function edit_employe_leave($id){
            $edit_data = LeaveEmploye::find($id);
            $employe= User::where("user_type","employe")->get();
            $leave_purpose= LeavePurpose::all();
            

            return view("backend.employe-leave.add-employe-leave",compact("leave_purpose","employe","edit_data"));
          

        }
        public function update(Request $request,$id){
            DB::transaction(function () use ($request,$id) {
                if ($request->leave_purpose_id==0) {
                   $leavePurpose = new LeavePurpose();
                   $leavePurpose->name= $request->name;
                   $leavePurpose->save();
                   $leave_purpose_id = $leavePurpose->id;

                }else{
                    $leave_purpose_id= $request->leave_purpose_id;

                }
                $leave_employe = LeaveEmploye::find($id);
                $leave_employe->employe_id= $request->employe_id;
                $leave_employe->leave_purpose_id= $leave_purpose_id;
                $leave_employe->start_date=date("Y-m-d",strtotime($request->start_date)) ;
                $leave_employe->end_date= date("Y-m-d",strtotime($request->end_date));
                $leave_employe->save();

            });
            return  redirect()->back()->with("success","Leave updated succesfully");
            

        }
        
 



}
