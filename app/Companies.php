<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = ['name',
    						'flights'];

public function flights()
{
	return $this->hasMany('App\Flights');
}
}
