<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $dates = ['start_date', 'end_date'];

    public function session()
    {
    	return $this->belongsTo('App\Session');
    }
}
