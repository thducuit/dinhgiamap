<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanPageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plan_pages', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('status')->default(0);
			$table->integer('plan_maps_id');
			$table->string('order');
			$table->string('_show')->default(1);
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
