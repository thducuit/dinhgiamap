<?php

class GroupTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$group = Sentry::createGroup(array(
            'name' => 'customer',
            'permissions' => array(
                    'create'=> 1,
                    'read'  => 1,
                    'update'=> 1,
                    'delete'=> 1
                )
        ));
		
	}

}