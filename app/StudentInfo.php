<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
{
    protected $table = "student_infos";
    public $timestamps = false;

     public function students()
    {
        return $this->belongsTo('App\Student');
    }

}
