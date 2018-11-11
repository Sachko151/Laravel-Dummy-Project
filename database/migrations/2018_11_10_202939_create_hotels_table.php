<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('hotels', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->text('info');
			$table->integer('phone_number');
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
		Schema::dropIfExists('hotels');
	}
}
