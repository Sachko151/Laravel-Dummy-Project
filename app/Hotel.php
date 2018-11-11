<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model {
	protected $fillable = [
		'name',
		'info',
		'phone_number',
		'city_id'];

	public function cities() {
		return $this->belongsTo('App\Cities');
	}
}
