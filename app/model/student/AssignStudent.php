<?php

namespace App\model\student;

use App\model\admin\Group;
use App\model\admin\Shift;
use App\model\admin\studentClass;
use App\model\admin\Year;
use App\User;
use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
    public function student(){
       return $this->belongsTo(User::class,"student_id","id");
    }
    public function class_name(){
       return $this->belongsTo(studentClass::class,"class_id","id");
    }
    public function year_name(){
       return $this->belongsTo(Year::class,"year_id","id");
    }

    public function user(){
        return $this->belongsTo(User::class,"student_id","id");
     }
    public function discount(){
        return $this->belongsTo(StudentDiscount::class,"id","assign_student_id");
     }

     public function group_name(){
        return $this->belongsTo(Group::class,"group_id","id");
     }
     public function shift_name(){
        return $this->belongsTo(Shift::class,"shift_id","id");
     }
     public function marks(){
        return $this->belongsTo(StudentMarks::class,"student_id","student_id");
     }
}
