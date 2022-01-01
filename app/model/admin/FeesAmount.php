<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class FeesAmount extends Model
{
    public function feesCategory(){
       return $this->belongsTo(Fee::class,"fee_category_id");
    }
    public function class_id(){
       return $this->belongsTo(studentClass::class,"Class_id");
    }
}
