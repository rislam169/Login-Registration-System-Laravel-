<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "Students";
    public $timestamps = false;

     public function details()
    {
        return $this->hasOne('App\StudentInfo', 'std_id');
    }
}
