<?php

namespace App\model\employe;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class LeaveEmploye extends Model
{
    public function user(){
        return $this->belongsTo(User::class, "employe_id","id");
    }
    public Function purpose(){
        return $this->belongsTo(LeavePurpose::class, "leave_purpose_id","id");
    }
}
