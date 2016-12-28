<?php
class PlanMap extends Eloquent{
    protected $table = 'plan_maps';
    protected $fillable = array('name', '_show');
    public static function isExistedName($name)
    {
        return PlanMap::where('name', '=', $name)->exists();
    }

    public static function getByName($name)
    {
        return PlanMap::where('name', '=', $name)->first();
    }
    
    public static function findByStatus()
    {
        return PlanMap::where('status', '=', 1)->where('_show', '=', 1)->get();
    }

    public static function getOptions()
    {
        $plans = PlanMap::where('status', '=', 1)->get();
        $options = array();
        foreach($plans as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }

    public static function findByWard($ward_id)
    {
        return PlanMap::where('status', '=', 1)->where('_show', '=', 1)->where('ward_id', '=', $ward_id)->first();
    }
}