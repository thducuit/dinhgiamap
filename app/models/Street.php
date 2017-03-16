<?php
class Street extends Eloquent {
    protected $table = 'streets';
    
    public function markers(){
        return $this->hasMany('Marker');
    }

    public function user()
    {
        return $this->hasOne('User');
    }

    public static function getPlanMapId($id) {
        return Street::where('id', '=', $id)->first()->plan_map_id;
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