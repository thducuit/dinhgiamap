<?php

class StructureOptionsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		 //delete users table records
        DB::table('structure_options')->truncate();
        //insert some dummy records
        DB::table('structure_options')->insert(array(
         array('structure'=>'Nhà 1 tầng, kết cấu tường gạch, mái BTCT', 'structure_id'=>1, 'price'=>3000000),
         array('structure'=>'Nhà 2 tầng, khung sàn, mái BTCT; tường gạch', 'structure_id'=>1, 'price'=>4000000),
         array('structure'=>'Nhà 3 tầng đến 4 tầng, khung sàn, mái BTCT; tường gạch', 'structure_id'=>1, 'price'=>5500000),
         array('structure'=>'Khung, sàn, mái BTCT (hoặc ngói); tường sơn nước; nền lát gạch ceramic hay tương đương.', 'structure_id'=>1, 'price'=>6000000),
         array('structure'=>'Khung, sàn BTCT; mái ngói; tường sơn nước; nền lát gạch ceramic hay tương đương.', 'structure_id'=>1, 'price'=>5800000),
         array('structure'=>'Khung, sàn BTCT; mái tôn; tường sơn nước; nền lát gạch ceramic hay tương đương.', 'structure_id'=>1, 'price'=>5500000),
         
         array('structure'=>'Nhà biệt thự trệt, khung (móng, cột, đà), mái BTCT (hoặc ngói); tường sơn nước; nền lát gạch bóng kính 80x80 hay tương đương; mặt tiền ốp đá granit.', 'structure_id'=>2, 'price'=>7500000),
         array('structure'=>'Nhà kiểu biệt thự từ 2 đến 3 tầng, khung, sàn, mái BTCT; tường gạch; nền lát gạch bóng kính 80x80 hay tương đương; mặt tiền ốp đá granit', 'structure_id'=>2, 'price'=>8500000),
         
         array('structure'=>'Dưới 6 tầng', 'structure_id'=>3, 'price'=>6080000),
         array('structure'=>'Từ 6 đến 8 tầng', 'structure_id'=>3, 'price'=>6710000),
         array('structure'=>'Từ 9 đến 15 tầng', 'structure_id'=>3, 'price'=>7300000),
         array('structure'=>'Từ 16 đến 19 tầng', 'structure_id'=>3, 'price'=>7930000),
         array('structure'=>'Từ 20 đến 25 tầng', 'structure_id'=>3, 'price'=>8820000),
         array('structure'=>'Từ 26 đến 30 tầng', 'structure_id'=>3, 'price'=>9260000),
         
         array('structure'=>'Khách sạn tiêu chuẩn 1*', 'structure_id'=>4, 'price'=>158490000),
         array('structure'=>'Khách sạn tiêu chuẩn 2*', 'structure_id'=>4, 'price'=>238750000),
         array('structure'=>'Khách sạn tiêu chuẩn 3*', 'structure_id'=>4, 'price'=>490400000),
         array('structure'=>'Khách sạn tiêu chuẩn 4*', 'structure_id'=>4, 'price'=>672590000),
         array('structure'=>'Khách sạn tiêu chuẩn 5*', 'structure_id'=>4, 'price'=>941660000),
         
         
         array('structure'=>'Dưới 6 tầng', 'structure_id'=>5, 'price'=>7800000),
         array('structure'=>'Từ 6 đến 8 tầng', 'structure_id'=>5, 'price'=>8600000),
         array('structure'=>'Từ 9 đến 15 tầng', 'structure_id'=>5, 'price'=>10120000),
         
         array('structure'=>'Tường gạch thu hồi mái ngói', 'structure_id'=>7, 'price'=>1640000),
         array('structure'=>'Tường gạch thu hồi mái tôn', 'structure_id'=>7, 'price'=>1640000),
         array('structure'=>'Tường gạch, bổ trụ, kèo thép, mái tôn', 'structure_id'=>7, 'price'=>1890000),
         array('structure'=>'Tường gạch, mái bằng', 'structure_id'=>7, 'price'=>2200000),
         array('structure'=>'Cột bê tông, kèo thép, tường gạch, mái tôn', 'structure_id'=>7, 'price'=>2610000),
         array('structure'=>'Cột kèo bê tông, tường gạch, mái tôn', 'structure_id'=>7, 'price'=>2810000),
         array('structure'=>'Cột kèo thép, tường gạch, mái tôn', 'structure_id'=>7, 'price'=>2380000),
         
         array('structure'=>'Cột kèo bê tông, tường gạch, mái tôn', 'structure_id'=>8, 'price'=>4400000),
         array('structure'=>'Cột bê tông kèo thép, tường gạch, mái tôn', 'structure_id'=>8, 'price'=>4140000),
         array('structure'=>'Cột kèo thép, tường bao che tôn, mái tôn', 'structure_id'=>8, 'price'=>3860000),
         array('structure'=>'Cột kèo thép, tường gạch, mái tôn', 'structure_id'=>8, 'price'=>3840000),
         array('structure'=>'Cột bê tông, kèo thép liền nhịp, tường gạch, mái tôn', 'structure_id'=>8, 'price'=>3770000),
         array('structure'=>'Cột kèo thép liền nhịp, tường gạch, mái tôn', 'structure_id'=>8, 'price'=>3580000),
         
         array('structure'=>'Cột bê tông, kèo thép, mái tôn', 'structure_id'=>9, 'price'=>4680000),
         array('structure'=>'Cột kèo bê tông, tường gạch, mái tôn', 'structure_id'=>9, 'price'=>4970000),
         array('structure'=>'Cột kèo thép, tường gạch, mái tôn', 'structure_id'=>9, 'price'=>4430000),
         array('structure'=>'Cột bê tông, kèo thép, tường gạch, mái tôn', 'structure_id'=>9, 'price'=>5250000),
         array('structure'=>'Cột kèo thép liền nhịp, tường bao che bằng tôn, mái tôn', 'structure_id'=>9, 'price'=>4280000),
         array('structure'=>'Cột bê tông, kèo thép liền nhịp, tường gạch, mái tôn', 'structure_id'=>9, 'price'=>4600000),
         
         array('structure'=>'Cột bê tông, kèo thép, tường gạch, mái tôn', 'structure_id'=>10, 'price'=>7170000),
         array('structure'=>'Cột kèo thép, tường gạch, mái tôn', 'structure_id'=>10, 'price'=>7450000),
         
         array('structure'=>'Kho lương thực, khung thép, sàn gỗ hay bê tông, mái tôn', 'structure_id'=>11, 'price'=>2810000),
         array('structure'=>'Kho lương thực xây cuốn gạch đá', 'structure_id'=>11, 'price'=>1690000),
         array('structure'=>'Kho hoá chất xây gạch mái bằng', 'structure_id'=>11, 'price'=>2610000),
         array('structure'=>'Kho hoá chất xây gạch, mái ngói', 'structure_id'=>11, 'price'=>1510000),
         array('structure'=>'Kho lạnh kết cấu gạch và bê tông sức chứa 100 tấn', 'structure_id'=>11, 'price'=>7450000),
         array('structure'=>'Kho lạnh kết cấu gạch và bê tông sức chứa 300 tấn', 'structure_id'=>11, 'price'=>9460000),
         
         array('structure'=>'Kho lương thực sức chứa 500 tấn', 'structure_id'=>12, 'price'=>2660000),
         array('structure'=>'Kho lương thực sức chứa 1.500 tấn', 'structure_id'=>12, 'price'=>2870000),
         array('structure'=>'Kho lương thực sức chứa 10.000 tấn', 'structure_id'=>12, 'price'=>3520000),
         array('structure'=>'Kho muối sức chứa 1.000 - 3.000 tấn', 'structure_id'=>12, 'price'=>2250000),
         array('structure'=>'Kho xăng dầu xây dựng ngoài trời sức chứa 20.000m3', 'structure_id'=>12, 'price'=>7470000),
        ));
	}

}