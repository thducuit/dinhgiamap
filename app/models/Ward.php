<?php
class Ward extends Eloquent{
    protected $table = 'ward';
    
    // public static function getOptions($district_id = 0)
    // {
    //     $ward = Ward::find();
    //     $options = array();
    //     foreach($ward as $d) {
    //         $options = array_add($options, $d->id, $d->name);
    //     }
    //     return $options;
    // }
    public static function name($id)
    {
        if( !empty($id) ) {
            $ward = Ward::find($id);
            return ($ward->name) ? $ward->name : '';
        }
        return null;
    }
}