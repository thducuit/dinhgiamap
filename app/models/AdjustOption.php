<?php
class AdjustOption extends Eloquent{
    protected $table = 'adjust_options';
    const CHIEU_NGANG = 1;
    const HINH_DANG_THUA_DAT = 4;
    const VI_TRI_TIEP_GIAP = 15;
    public static function findByGroupId($id)
    {
        return AdjustOption::where('group_id', '=', $id);
    }
    
    
    
}