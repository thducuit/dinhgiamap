<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEstates extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estates', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('address');
			$table->string('bedroom');
			$table->string('bathroom');
			$table->string('areas');
			$table->string('price');
			$table->string('cost');
			$table->text('description');
			$table->double('lat', 10, 6);
			$table->double('lng', 10, 6);

			$table->string('wifi');
			$table->string('banlamviec');
			$table->string('tuquanao');
			$table->string('khoangcachtrannha');
			$table->string('tulanh');
			$table->string('noithatmoi');
			$table->string('maylanh');
			$table->string('bontam');
			$table->string('tivi');
			$table->string('tudaugiuong');
			$table->string('bantrangdiem');
			$table->string('bantivi');
			$table->string('kean');

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
