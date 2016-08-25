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
         array('title'=>'Dịch vụ định giá'),
         array('title'=>'Xem qui hoạch'),
         array('title'=>'Mua gói tài khoản'),
         array('title'=>'Tài sản cùng đơn giá')
      
        ));
	}

}