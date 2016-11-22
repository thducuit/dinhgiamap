<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeResults extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('results', function(Blueprint $table) {
			$table->dropColumn('total_price');
			$table->dropColumn('unit_price');
			$table->dropColumn('building_price');
			$table->dropColumn('total');
		});
		
		Schema::table('results', function(Blueprint $table) {
			$table->bigInteger('total_price');
			$table->bigInteger('unit_price');
			$table->bigInteger('building_price');
			$table->bigInteger('total');
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
