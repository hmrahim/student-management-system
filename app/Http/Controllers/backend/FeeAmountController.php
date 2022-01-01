<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Fee;
use App\model\admin\FeesAmount;
use App\model\admin\studentClass;
use Illuminate\Http\Request;


class FeeAmountController extends Controller
{
    public function view_fees_amount(){
        $year= FeesAmount::select("fee_category_id")->groupBy("fee_category_id")->get();
        return view("backend.fees-amount.view-fees-amount",compact("year"));
    }
    public function add_fees_amount(){
        $fee= Fee::get();
        $class= studentClass::get();
        return view("backend.fees-amount.add-fees-amount",compact("fee","class"));
    }



    public function insert_data(Request $request){

        $countClass = count($request->class);

        if($countClass != NULL){


            for ($i=0; $i < $countClass ; $i++) {
                $amount = new FeesAmount();
                $amount->fee_category_id= $request->category;
                $amount->Class_id= $request->class[$i];
                $amount->fees_amount= $request->amount[$i];
                $amount->save();


            }

        }

       return  redirect()->back()->with("success","Data inserted succesfully");

    }
    public function edit_data($fee_category_id){
        $edit_data = FeesAmount::where("fee_category_id",$fee_category_id)->get();
        $fee= Fee::get();
        $class= studentClass::get();

        return view("backend.fees-amount.edit-fees-amount",compact("edit_data","fee","class"));

    }
    public function update_data(Request $request,$fee_category_id){

        $edit_data = FeesAmount::where("fee_category_id",$fee_category_id)->delete();
        if ($request->class == NULL ) {

            return  redirect()->back();
        }else{

            $countClass = count($request->class);




            for ($i=0; $i < $countClass ; $i++) {
                $amount = new FeesAmount();
                $amount->fee_category_id= $request->category;
                $amount->Class_id= $request->class[$i];
                $amount->fees_amount= $request->amount[$i];
                $amount->save();


            }



        }
        return  redirect()->back()->with("success","Data updated succesfully");






    }
    public function view_data($fee_category_id){
        $edit_data = FeesAmount::where("fee_category_id",$fee_category_id)->get();
       return view("backend.fees-amount.view-fees-amount-data",compact("edit_data"));

    }
}
