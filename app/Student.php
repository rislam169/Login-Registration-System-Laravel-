<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    public $timestamps = false;

     public function details()
    {
        return $this->hasOne('App\StudentInfo', 'student_id');
    }

     public function education()
    {
        return $this->hasMany('App\EducationInfo', 'student_id');
    }
}
