<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdjustOptionsSeeder
 *
 * @author Dell
 */
class AdjustOptionsSeeder extends Seeder {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    //Bảng điều chỉnh theo chiều ngang (Chiều rộng tiếp giáp mặt tiền của thửa đất) (m)
    DB::table('adjust_options')->where('group_id', '=', AdjustOption::CHIEU_NGANG)->delete();

    DB::table('adjust_options')->insert(array(
        array('_order' => 0, 'description' => '<2', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => -7, 'quanTrungTamHem' => -3, 'quanKhacMatTien' => -5, 'quanKhacHem' => -3.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '2 - <3', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => -5, 'quanTrungTamHem' => -4, 'quanKhacMatTien' => -4, 'quanKhacHem' => -4.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '3 - <4', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => -2.5, 'quanTrungTamHem' => -1, 'quanKhacMatTien' => -2, 'quanKhacHem' => -1.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '4 - <5.1', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 0, 'quanTrungTamHem' => 0, 'quanKhacMatTien' => 0, 'quanKhacHem' => 0, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '5.1 - <6', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 3, 'quanTrungTamHem' => 2.5, 'quanKhacMatTien' => 3, 'quanKhacHem' => 2, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '6 - <7', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 4, 'quanTrungTamHem' => 3, 'quanKhacMatTien' => 3.5, 'quanKhacHem' => 2.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '7 - <8', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 5, 'quanTrungTamHem' => 4, 'quanKhacMatTien' => 4.5, 'quanKhacHem' => 3.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '8 - <9', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 7, 'quanTrungTamHem' => 4.5, 'quanKhacMatTien' => 6.5, 'quanKhacHem' => 4, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '9 - <10', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 7, 'quanTrungTamHem' => 4.5, 'quanKhacMatTien' => 6.5, 'quanKhacHem' => 4, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '10 - <11', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 10, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 7.5, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '11 - <12', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 10, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 7.5, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '12 - <13', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 12, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 9, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '13 - <14', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 12, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 9, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '14 - <15', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 12, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 9, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '15 - <20', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 14, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 11, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '20 - <25', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 17, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 14, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '≥25', 'group_id' => AdjustOption::CHIEU_NGANG, 'quanTrungTamMatTien' => 17, 'quanTrungTamHem' => 6, 'quanKhacMatTien' => 14, 'quanKhacHem' => 5.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1)
    ));

    //Hình dạng thửa đất 
    DB::table('adjust_options')->where('group_id', '=', AdjustOption::HINH_DANG_THUA_DAT)->delete();
    DB::table('adjust_options')->insert(array(
        array('_order' => 0, 'description' => 'Vuông vức', 'group_id' => AdjustOption::HINH_DANG_THUA_DAT, 'quanTrungTamMatTien' => 0, 'quanTrungTamHem' => 0, 'quanKhacMatTien' => 0, 'quanKhacHem' => 0, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => 'Nở hậu', 'group_id' => AdjustOption::HINH_DANG_THUA_DAT, 'quanTrungTamMatTien' => 5, 'quanTrungTamHem' => 5, 'quanKhacMatTien' => 5, 'quanKhacHem' => 5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => 'Tóp hậu', 'group_id' => AdjustOption::HINH_DANG_THUA_DAT, 'quanTrungTamMatTien' => -7, 'quanTrungTamHem' => -7, 'quanKhacMatTien' => -7, 'quanKhacHem' => -7, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => 'Hình dáng phức tạp', 'group_id' => AdjustOption::HINH_DANG_THUA_DAT, 'quanTrungTamMatTien' => -12, 'quanTrungTamHem' => -12, 'quanKhacMatTien' => -12, 'quanKhacHem' => -12, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null)
    ));

    //Bảng điều chỉnh theo vị trí BĐS tiếp giáp
    DB::table('adjust_options')->where('group_id', '=', AdjustOption::VI_TRI_TIEP_GIAP)->delete();
    DB::table('adjust_options')->insert(array(
        array('_order' => 0, 'description' => '1 mặt tiền hẻm', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 0, 'quanKhac' => 0, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '2 mặt tiền hẻm', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 5, 'quanKhac' => 5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '2 hẻm trở lên', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 7, 'quanKhac' => 7, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => '1 mặt tiền đường', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 0, 'quanKhac' => 0, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '2 mặt tiền đường', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 15, 'quanKhac' => 10, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '2 mặt tiền đường trở lên', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 20, 'quanKhac' => 15, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => '1 mặt tiền đường, 1 mặt tiền hẻm hông', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 7, 'quanKhac' => 5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => '1 mặt tiền đường, 1 mặt tiền hẻm', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 7, 'quanKhac' => 5, 'isForThamDinhGia' => null, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '1 mặt tiền đường, 1 mặt tiền hẻm sau', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 5, 'quanKhac' => 5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => '1 mặt tiền đường, 2 mặt tiền hẻm trở lên', 'group_id' => AdjustOption::VI_TRI_TIEP_GIAP, 'quanTrungTam' => 10, 'quanKhac' => 8, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1)
    ));
    //Yếu tố khác
    DB::table('adjust_options')->where('group_id', '=', AdjustOption::YEU_TO_KHAC)->delete();
    DB::table('adjust_options')->insert(array(
        array('_order' => 0, 'description' => 'BĐS nằm gần trung tâm thương mại, bệnh viện, trường học (Trong phạm vi ≤100m)', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => 5, 'quanKhac' => 4, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),        
        array('_order' => 0, 'description' => 'Đường hướng thẳng vào nhà.', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => -10, 'quanKhac' => -10, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => 'Nằm dưới bụng cầu', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => -20, 'quanKhac' => -20, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),        
        array('_order' => 0, 'description' => 'Trụ điện trước nhà', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => -7, 'quanKhac' => -7, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),
        array('_order' => 0, 'description' => 'Gần nghĩa trang, miếu (Trong phạm vi ≤ 100m)', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => -15, 'quanKhac' => -15, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),       
        array('_order' => 0, 'description' => 'Gần đình, chùa (Trong phạm vi ≤100m)', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => 5, 'quanKhac' => 5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null),       
        array('_order' => 0, 'description' => 'Gần đường điện cao thế (Trong phạm vi ≤100m)', 'group_id' => AdjustOption::YEU_TO_KHAC, 'quanTrungTam' => -5, 'quanKhac' => -4, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => null)
        
    ));
    
    //diện tích đất ở (m2)
    DB::table('adjust_options')->where('group_id', '=', AdjustOption::DIEN_TICH_DAT)->delete();
    DB::table('adjust_options')->insert(array(
        array('_order' => 0, 'description' => '≤25', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -5, 'quanTrungTamHem' => -5, 'quanKhacMatTien' => -5, 'quanKhacHem' => -5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '25 - ≤36', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => 3, 'quanTrungTamHem' => 3.5, 'quanKhacMatTien' => 2.5, 'quanKhacHem' => 3.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '36 - ≤50', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => 1.5, 'quanTrungTamHem' => 2, 'quanKhacMatTien' => 1, 'quanKhacHem' => 2, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '50 - ≤101', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => 0, 'quanTrungTamHem' => 0, 'quanKhacMatTien' => 0, 'quanKhacHem' => 0, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '101 - ≤150', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -2, 'quanTrungTamHem' => -3.5, 'quanKhacMatTien' => -2.5, 'quanKhacHem' => -4, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '150 - ≤200', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -4, 'quanTrungTamHem' => -7, 'quanKhacMatTien' => -4.5, 'quanKhacHem' => -7.5, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '200 - ≤300', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -6, 'quanTrungTamHem' => -10, 'quanKhacMatTien' => -6.5, 'quanKhacHem' => -11, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '300 - ≤400', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -8, 'quanTrungTamHem' => -12, 'quanKhacMatTien' => -10, 'quanKhacHem' => -13, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '400 - ≤500', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -11, 'quanTrungTamHem' => -15, 'quanKhacMatTien' => -13, 'quanKhacHem' => -16, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '500 - ≤1000', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -15, 'quanTrungTamHem' => -18, 'quanKhacMatTien' => -17, 'quanKhacHem' => -19, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
        array('_order' => 0, 'description' => '>1000', 'group_id' => AdjustOption::DIEN_TICH_DAT, 'quanTrungTamMatTien' => -18, 'quanTrungTamHem' => -22, 'quanKhacMatTien' => -21, 'quanKhacHem' => -23, 'isForThamDinhGia' => 1, 'isForDinhGiaSoBo' => 1),
    ));
  }

}
