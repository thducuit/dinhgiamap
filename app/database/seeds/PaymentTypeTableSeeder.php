<?php

class PaymentTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//delete users table records
        DB::table('payment_type')->truncate();
        //insert some dummy records
        DB::table('payment_type')->insert(array(
         array('id'=>'card', 'title' => 'SMS (Thẻ cào điện thoại)'),
         array('id'=>'internetbanking', 'title' => 'Internet Banking'),
         array('id'=>'office', 'title' => 'Chuyển khoản & thanh toán tại VP'),
         array('id'=>'visa', 'title' => 'Thanh toán bằng visa')
        ));
	}

}