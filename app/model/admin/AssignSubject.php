<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    public function class_name(){
       return $this->belongsTo(studentClass::class,"class_id");

    }
    public function subject_name(){
       return $this->belongsTo(Subject::class,"subject_id");

    }


}
