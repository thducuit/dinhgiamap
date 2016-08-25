<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMarkerPlan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('markers', function(Blueprint $table) {
			$table->integer('province_id');
			$table->integer('district_id');
			$table->integer('ward_id');
			$table->integer('class_field');
			$table->integer('plan_field');
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
