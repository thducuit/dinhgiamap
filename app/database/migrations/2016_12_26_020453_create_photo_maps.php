<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoMaps extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_maps', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('status')->default(0);
			$table->integer('province_id');
			$table->integer('district_id');
			$table->integer('ward_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
