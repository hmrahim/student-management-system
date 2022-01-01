<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\model\admin\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    public function view_year(){
        $year= Year::get();
        return view("backend.year.view-year",compact("year"));
    }
    public function add_year(){
        return view("backend.year.add-year");
    }
    public function insert_data(Request $request){
        $year= new Year();
        $request->validate([
            "name" => "required|unique:years,name"
        ]);

        $year->name= $request->name;
        $year->save();
       return  redirect()->route("view_year")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= Year::find($id);
        return view("backend.year.add-year",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = Year::find($id);

        $request->validate([
            "name" => "required|unique:years,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_year")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= Year::find($id);
        $data->delete();
        return  redirect()->route("view_year")->with("success","Data deleted succesfully");



    }
}
