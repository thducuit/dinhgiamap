<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeMarkers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('markers', function(Blueprint $table) {
			$table->dropColumn('price');
			$table->dropColumn('state_price');
		});
		
		Schema::table('markers', function(Blueprint $table) {
			$table->bigInteger('price');
			$table->bigInteger('state_price');
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
