<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function classe(){
        return $this->belongsTo(Classe::class,'class_id');
    }
}
