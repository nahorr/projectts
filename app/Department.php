<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public function faculty_group()
    {
    	return $this->belongsTo('App\Faculty_group');
    }

    public function programs()
    {
    	return $this->hasMany('App\Program');
    }

    public function instructors()
    {
    	return $this->hasMany('App\Instructor');
    }

    public function courses()
    {
    	return $this->hasMany('App\Course');
    }
}
