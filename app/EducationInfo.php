<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    protected $table = "education_infos";
    public $timestamps = false;


     public function students()
    {
        return $this->belongsTo('App\Student');
    }
}
