<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function session()
    {
    	return $this->belongsTo('App\Session');
    }

    public function semester()
    {
    	return $this->belongsTo('App\Semester');
    }

    public function department()
    {
    	return $this->belongsTo('App\Department');
    }

    public function instructor()
    {
    	return $this->belongsTo('App\Instructor');
    }

    public function student_courses()
    {
        return $this->hasMany('App\Student_course');
    }
}
