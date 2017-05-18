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

		DB::transaction(function()
		{
		    $results = Excel::load('public/data/T5/PHU TRUNG.xls')->get();
		    //var_dump((array)$results[0]); die();
		    $count = 1;
			foreach($results as $row) {
				//dd((array)$row); die();
				if(!empty($row->ky_hieu)) {
					$name = join(', ', array($row->dia_chi, $row->duong, 'Phú Trung', 'Tân Phú'));
					//dd($name);
					$gia_thi_truong = ($row->gia_thi_truong) ? $row->gia_thi_truong : 0;
					$gia_ubnd = ($row->gia_ubnd) ? $row->gia_ubnd : 0;
					echo $name;
					DB::table('markers')->insert(array(
						array('code'=>$row->ky_hieu, 'name'=> $name, 'price' => $gia_thi_truong, 'state_price' => $gia_ubnd, 'province_id'=>79, 'ward_id'=>27031, 'district_id'=>767)
				   ));
				   $count++;	
				}
			}
			echo 'total: ' . $count;
		});
		
		
		
	}

}