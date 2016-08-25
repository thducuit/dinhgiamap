<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('customers', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email');
			$table->integer('sex')->default(0);
			$table->string('mobile');
			$table->string('phone')->nullable();
			$table->date('bday')->nullable();
			$table->integer('province_id')->default(0);
			$table->integer('district_id')->default(0);
			$table->integer('user_id')->default(0);
			$table->text('note');
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
		Schema::drop('customers');

	}

}
