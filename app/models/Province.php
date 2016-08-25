<?php
class Province extends Eloquent{
    protected $table = 'province';
    
    public static function getOptions()
    {
        $province = Province::all();
        $options = array();
        foreach($province as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }
    
    public function districts()
    {
        return $this->hasMany('District');
    }
}