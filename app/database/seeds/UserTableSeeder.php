<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->truncate();
		DB::table('users_groups')->truncate();
		DB::table('structure_options')->truncate();
		$data = array(
			array('email'=> 'trangtm@cengroup.vn', 'password' => '123456', 'group'=>'administrator'),
			array('email'=> 'admin@cengroup.vn', 'password' => '123456', 'group'=>'administrator'),
			array('email'=> 'phunglk@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'hoalq@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ngocntn@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ks1@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ks2@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ks3@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ks4@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'ks5@cengroup.vn', 'password' => '123456', 'group'=>'writer'),
			array('email'=> 'tindv@cengroup.vn', 'password' => '123456', 'group'=>'administrator'),
			array('email'=> 'thendh@cengroup.vn', 'password' => 'Dinhgiabiz', 'group'=>'administrator'),
		);
		//Find group
		foreach ($data as $key => $d) {
			$group = Sentry::findGroupByName($d['group']);
			$user = Sentry::createUser(array(
				'email'=>$d['email'],
				'password'=>$d['password'],
				'activated' => true,
			));
	            
	        
	        // Assign the group to the user
	        $user->addGroup($group);
		}
		
	}

}