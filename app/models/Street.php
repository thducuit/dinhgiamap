<?php
class Street extends Eloquent {
    protected $table = 'streets';
    
    public function markers(){
        return $this->hasMany('Marker');
    }
    
    public static function getOptions()
    {
        $streets = Street::all();
        $options = array();
        foreach($streets as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }
}