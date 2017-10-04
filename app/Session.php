<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $dates = ['start_date', 'end_date'];

    public function semesters()
    {
    	return $this->hasMany('App\Semeter');
    }
}
