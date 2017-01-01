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

		$results = Excel::load('public/data/update/P Tan Thanh.xlsx')->get();

		foreach($results as $row) {
			//dd((array)$row); die();
			$name = join(', ', array($row->diachi, $row->duong, $row->phuong, $row->quan));
			$gia_thi_truong = ($row->giathitruong) ? $row->giathitruong : 0;
			$gia_ubnd = ($row->giaubnd) ? $row->giaubnd : 0;
			echo $name;
			DB::table('markers')->insert(array(
			        array('name'=> $name, 'price' => $gia_thi_truong, 'state_price' => $gia_ubnd)
			   ));
		}
		
		
	}

}