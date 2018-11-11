<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    protected $fillable = ['start',
							'end',
							'price',
							'hours',
							'cities_num',
							'cities',
							'company_id'];

public function companies()
{
	return $this->belongsTo('App\Companies');
}
}
