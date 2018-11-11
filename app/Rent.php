<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model {
	protected $fillable = [
		'name',
		'info',
		'available_cars',
		'city_id'];

	public function cities() {
		return $this->belongsTo('App\Cities');
	}

}
