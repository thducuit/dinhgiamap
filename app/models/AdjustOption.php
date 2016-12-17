<?php
class AdjustOption extends Eloquent{
    protected $table = 'adjust_options';
    const CHIEU_NGANG = 1;
    const HINH_DANG_THUA_DAT = 4;
    const VI_TRI_TIEP_GIAP = 15;
    const YEU_TO_KHAC = 16;
    const DIEN_TICH_DAT = 3;
    public static function findByGroupId($id, $isForThamDinhGia = null, $isForDinhGiaSoBo = null)
    {
      $query = AdjustOption::where('group_id', '=', $id);
      if($isForThamDinhGia){
        $query = $query->where('isForThamDinhGia', '=', $isForThamDinhGia);
      }
      if($isForDinhGiaSoBo){
        $query = $query->where('isForDinhGiaSoBo', '=', $isForDinhGiaSoBo);
      }
        return $query;
    }
    
    
    
}