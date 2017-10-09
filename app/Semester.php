<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $dates = ['start_date', 'end_date', 'reg_starts', 'reg_ends'];

    public function session()
    {
    	return $this->belongsTo('App\Session');
    }

    public function courses()
    {
    	return $this->hasMany('App\Course');
    }
}
