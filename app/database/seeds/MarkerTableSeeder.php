<?php

class MarkerTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$results = Excel::load('public/data/diachi phu trung.xlsx')->get();

		DB::table('markers')->truncate();
		foreach($results as $row) {
			//dd($row); die();
			$name = join(', ', array($row->dia_chi, $row->duong, $row->phuong, $row->quan));
			//echo $name; die();
			DB::table('markers')->insert(array(
		         array('name'=> $name)
		        ));
			
		}
	}

}