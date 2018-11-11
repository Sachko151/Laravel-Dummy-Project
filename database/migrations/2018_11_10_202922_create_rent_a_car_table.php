<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentACarTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('rent_a_car', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('info');
			$table->integer('available_cars');
			$table->unsignedInteger('city_id');
			$table->foreign('city_id')->references('id')->on('cities');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('rent_a_car');
	}
}
