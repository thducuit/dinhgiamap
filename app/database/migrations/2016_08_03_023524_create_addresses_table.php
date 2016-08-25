<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('markers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('street_id')->unsigned()->default(0);
			$table->double('lat', 10, 6);
			$table->double('lng', 10, 6);
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
		Schema::drop('markers');
		
	}

}
