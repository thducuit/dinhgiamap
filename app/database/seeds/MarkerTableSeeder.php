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
		DB::table('markers')->truncate();

		$results = Excel::load('public/data/new/Hiep Tan.xls')->get();

		foreach($results as $row) {
			//dd((array)$row); die();
			if(!empty($row->ky_hieu)) {
				$name = join(', ', array($row->value, $row->duong, 'Hiệp Tân', 'Tân Phú'));
				$gia_thi_truong = ($row->gia_thi_truong) ? $row->gia_thi_truong : 0;
				$gia_ubnd = ($row->gia_ubnd) ? $row->gia_ubnd : 0;
				echo $name;
				DB::table('markers')->insert(array(
						array('code'=>$row->ky_hieu, 'name'=> $name, 'price' => $gia_thi_truong, 'state_price' => $gia_ubnd)
				   ));
			}
			
		}
		
		
	}

}