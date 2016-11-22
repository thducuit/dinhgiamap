<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('PaymentServiceTableSeeder');
		//$this->call('PaymentTypeTableSeeder');
		//$this->call('StructureTableSeeder');
		//$this->call('StructureOptionsTableSeeder');
		$this->call('MarkerTableSeeder');
		//$this->call('GroupTableSeeder');
	}

}
