<?php

class MarkerTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$list = array(
			'Hiep Tan', 'Hoa Thanh', 'Phu Thanh', 'Phu Tho Hoa', 'Phu Trung', 'Son Ky', 'Tan Quy', 'Tan Son Nhi', 'Tay Thanh'
		);
		//DB::table('markers')->truncate();

		$results = Excel::load('public/data/P Hoa Thanh.xlsx')->get();

		foreach($results as $row) {
			dd((array)$row); die();
			$name = join(', ', array($row->dia_chi, $row->duong, $row->phuong, $row->quan));
			$gia_thi_truong = ($row->gia_thi_truong) ? $row->gia_thi_truong : 0;
			$gia_ubnd = ($row->gia_ubnd) ? $row->gia_ubnd : 0;
			echo $name;
			// DB::table('markers')->insert(array(
			//         array('name'=> $name, 'price' => $gia_thi_truong, 'state_price' => $gia_ubnd)
			//    ));
		}
		
		
	}

}