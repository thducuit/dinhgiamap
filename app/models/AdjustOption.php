<?php
class AdjustOption extends Eloquent{
    protected $table = 'adjust_options';
    
    public static function findByGroupId($id)
    {
        return AdjustOption::where('group_id', '=', $id);
    }
    
    
    
}