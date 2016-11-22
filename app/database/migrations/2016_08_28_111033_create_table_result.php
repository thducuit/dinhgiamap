<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableResult extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('results', function(Blueprint $table) {
			$table->increments('id');
			$table->string('place_id');
			$table->string('name');
			$table->mediumInteger('total_price');
			$table->mediumInteger('unit_price');
			$table->mediumInteger('building_price');
			$table->mediumInteger('total');
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
