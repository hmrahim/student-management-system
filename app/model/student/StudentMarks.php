<?php

namespace App\model\student;

use App\model\admin\studentClass;
use App\User;
use Illuminate\Database\Eloquent\Model;

class StudentMarks extends Model
{
   public function user(){
       return $this->belongsTo(User::class,"student_id","id");
   }
   public function class_name(){
    return $this->belongsTo(studentClass::class,"class_id","id");
 }
 
}
