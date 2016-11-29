<?php
class Plan extends Eloquent{
    protected $table = 'plans';
    protected $fillable = array('name', '_show');
    public static function isExistedName($name)
    {
        return Plan::where('name', '=', $name)->exists();
    }

    public static function getByName($name)
    {
        return Plan::where('name', '=', $name)->first();
    }
    
    public static function findByStatus()
    {
        return Plan::where('status', '=', 1)->where('_show', '=', 1)->get();
    }

    public static function getOptions()
    {
        $plans = Plan::where('status', '=', 1)->get();
        $options = array();
        foreach($plans as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }
}