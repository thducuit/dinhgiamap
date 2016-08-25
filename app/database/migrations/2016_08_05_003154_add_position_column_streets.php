<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPositionColumnStreets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('streets', function(Blueprint $table) {
			$table->double('start_lat', 10, 6);
			$table->double('start_lng', 10, 6);
			$table->double('end_lat', 10, 6);
			$table->double('end_lng', 10, 6);
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
