<?php

namespace App\Http\Controllers\backend;

use App\model\admin\Shift;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function view_shift(){
        $year= Shift::get();
        return view("backend.shift.view-shift",compact("year"));
    }
    public function add_shift(){
        return view("backend.shift.add-shift");
    }
    public function insert_data(Request $request){
        $year= new Shift();
        $request->validate([
            "name" => "required|unique:shifts,name"
        ]);

        $year->name= $request->name;
        $year->save();
       return  redirect()->route("view_shift")->with("success","Data inserted succesfully");

    }
    public function edit_data($id){
        $edit_data= Shift::find($id);
        return view("backend.shift.add-shift",compact("edit_data"));

    }
    public function update_data(Request $request,$id){
        $data = Shift::find($id);

        $request->validate([
            "name" => "required|unique:shifts,name,".$data->id
        ]);

        $data->name= $request->name;
        $data->save();
       return  redirect()->route("view_shift")->with("success","Data updated succesfully");


    }
    public function delete_data($id){
        $data= Shift::find($id);
        $data->delete();
        return  redirect()->route("view_shift")->with("success","Data deleted succesfully");



    }
}
