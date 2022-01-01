<?php

namespace App\Http\Controllers\backend\student;

use App\Http\Controllers\Controller;
use App\model\admin\Fee;
use App\model\admin\FeesAmount;
use App\model\admin\studentClass;
use App\model\admin\Year;
use App\model\student\AssignStudent;
use Illuminate\Http\Request;
use PDF;

class MonthlyFeeController extends Controller
{


  public function view(){

    $year= Year::orderBy("id","desc")->get();

    $class = studentClass::all();

    return view("backend.student.student-fees.view-monthly-fee",compact("year","class",));
}

public function get_student_monthly_fee(Request $request){
    $class_id = $request->class_id;
    $year_id = $request->year_id;


   if ($class_id != '') {
       $where[] = ["class_id","like",$class_id."%"];
       # code...
   }
   if ($year_id != '') {
       $where[] = ["year_id","like",$year_id."%"];
       # code...
   }
   $alldata= AssignStudent::with("discount")->where($where)->get();

   $html["thsourch"] = '<th>SL</th>';
   $html["thsourch"] .= '<th>ID NO</th>';
   $html["thsourch"] .= '<th>Student Name</th>';
   $html["thsourch"] .= '<th>Roll No</th>';
   $html["thsourch"] .= '<th>Monthly Fee</th>';
   $html["thsourch"] .= '<th>DIscount</th>';
   $html["thsourch"] .= '<th>Fee(This student)</th>';
   $html["thsourch"] .= '<th>Action</th>';

   foreach ($alldata as $key => $value) {
       $monthlyFee= FeesAmount::where("fee_category_id","2")->where("class_id",$value->class_id)->first();
       $html[$key]["tdsourch"] = '<td>'.($key+1).'</td>';
       $html[$key]["tdsourch"] .= '<td>'.$value->user->id_no.'</td>';
       $html[$key]["tdsourch"] .= '<td>'.$value->user->name.'</td>';
       $html[$key]["tdsourch"] .= '<td>'.$value->roll.'</td>';
       $html[$key]["tdsourch"] .= '<td>'.$monthlyFee->fees_amount.'tk </td>';
       $html[$key]["tdsourch"] .= '<td>'.$value->discount->discount.'% </td>';


        $originalFee = $monthlyFee->fees_amount;
        $discount = $value->discount->discount;
        $disountedFee = $originalFee*$discount/100;
        $finalFee = (float)$originalFee-(float)$disountedFee;
       $html[$key]["tdsourch"] .= '<td>'.$finalFee.'tk </td>';
       $html[$key]["tdsourch"] .= '<td><a href="'.route('get_pdf_monthly_fee',$value->student_id).'?class_id='.$value->class_id.'&student_id='.$value->student_id.'&month='.$request->month_id.'"  class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a></td>';
    //    $html[$key]["tdsourch"] .= '<td>'..'</td>';

   }
   return response()->json(@$html);


}
public function get_pdf_monthly_fee(Request $request){
    $class_id=$request->class_id;
    $student_id= $request->student_id;
    $month = $request->month;


    $alldata = AssignStudent::with("discount")->where("student_id",$student_id)->where("class_id",$class_id)->first();

    $pdf= PDF::loadView("backend.student.student-fees.monthlt-paysleep",compact("alldata","month"));
    $pdf->SetProtection(["copy","print"],"", "");
    return $pdf->stream( $alldata->user->id_no."monthlyfee.pdf");


}
}
