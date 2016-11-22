<?php
class District extends Eloquent{
    protected $table = 'district';
    
    public static function getOptions()
    {
        $district = District::orderBy('name', 'asc')->get();
        $options = array();
        foreach($district as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }
    
    public function wards()
    {
        return $this->hasMany('Ward');
    }

    public static function name($id)
    {
        if( !empty($id) ) {
            $district = District::find($id);
            return ($district->name) ? $district->name : '';
        }
        return null;
    }

    public static function getByProvince($province_id = 0)
    {
        return District::where('province_id', '=', $province_id)->orderBy('name', 'asc')->get();
    }
    
    
}