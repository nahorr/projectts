<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty_group extends Model
{
    public function departments()
    {
    	return $this->hasMany('App\Department');
    }
}
