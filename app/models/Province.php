<?php
class Province extends Eloquent{
    protected $table = 'province';
    
    public static function getOptions()
    {
        $province = Province::orderBy('name', 'asc')->get();
        $options = array(79 => 'Hồ Chí Minh');
        foreach($province as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }
    
    public function districts()
    {
        return $this->hasMany('District');
    }

    public static function name($id)
    {
        if( !empty($id) ) {
            $province = Province::find($id);
            return ($province->name) ? $province->name : '';
        }
        return null;
    }
}