<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model {
	protected $fillable = ['name'];
	public function hotels() {
		return $this->hasMany('App\Hotel');
	}
	public function rents() {
		return $this->hasMany('App\Rent');
	}
}
