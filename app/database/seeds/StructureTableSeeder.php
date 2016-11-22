<?php

class StructureTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//delete users table records
        DB::table('structure')->truncate();
        //insert some dummy records
        DB::table('structure')->insert(array(
         array('name'=>'Nhà phố', 'alias'=>'nha-pho', 'pid'=>0),
         array('name'=>'Biệt thự', 'alias'=>'biet-thu', 'pid'=>0),
         array('name'=>'Căn hộ', 'alias'=>'can-ho', 'pid'=>0),
         array('name'=>'Khách sạn', 'alias'=>'khach-san', 'pid'=>0),
         array('name'=>'Toà nhà văn phòng', 'alias'=>'toa-nha-van-phong', 'pid'=>0),
         array('name'=>'Kho xưởng', 'alias'=>'kho-xuong', 'pid'=>0),
         array('name'=>'Nhà 1 tầng khẩu độ 12m, cao ≤ 6m, không có cầu trục', 'alias'=>'kho-xuong-nha-1-tang-9-m', 'pid'=>6),
         array('name'=>'Nhà 1 tầng khẩu độ 15m, cao ≤ 9 m, không có cầu trục', 'alias'=>'kho-xuong-nha-1-tang-15-m', 'pid'=>6),
         array('name'=>'Nhà 1 tầng khẩu độ 18m, cao 9 m, có cầu trục 5 tấn', 'alias'=>'kho-xuong-nha-1-tang-9-m-truc-5-tan', 'pid'=>6),
         array('name'=>'Nhà 1 tầng khẩu độ 24m, cao 9 m, có cầu trục 10 tấn', 'alias'=>'kho-xuong-nha-1-tang-9-m-truc-10-tan', 'pid'=>6),
         array('name'=>'Kho chuyên dụng loại nhỏ (sức chứa <500tấn)', 'alias'=>'kho-chuyen-dung-nho-hon-500-tan', 'pid'=>6),
         array('name'=>'Kho chuyên dụng loại lớn (sức chứa ≥ 500 tấn)', 'alias'=>'kho-chuyen-dung-lon-hon-500-tan', 'pid'=>6),
         
        ));
	}

}