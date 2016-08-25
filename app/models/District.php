<?php
class District extends Eloquent{
    protected $table = 'district';
    
    // public static function getOptions($province_id = 0)
    // {
    //     $district = District::find();
    //     $options = array();
    //     foreach($district as $d) {
    //         $options = array_add($options, $d->id, $d->name);
    //     }
    //     return $options;
    // }
    
    public function wards()
    {
        return $this->hasMany('Ward');
    }
    
    
}