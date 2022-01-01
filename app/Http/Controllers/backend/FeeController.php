<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function view_fee(){
        $year= Fee::get();
        return view("backend.fee.view-fee",compact("year"));
    }
    public function add_fee(){
        return view("backend.fee.add-fee");
    }
    public function insert_fee_data(Request $request){
        $year= new Fee();
        $request->validate([
            "name" => "required|unique:fees,name"
        ]);

        $year->name= $request->name;
        $year->save();
       return  redirect()->route("view_fee")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= Fee::find($id);
        return view("backend.fee.add-fee",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = Fee::find($id);

        $request->validate([
            "name" => "required|unique:fees,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_fee")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= Fee::find($id);
        $data->delete();
        return  redirect()->route("view_fee")->with("success","Data deleted succesfully");



    }
}
