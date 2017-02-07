<?php
class PlanArea extends Eloquent{
    protected $table = 'plan_areas';
    protected $fillable = array('name', '_show');
    public static function isExistedName($name)
    {
        return PlanArea::where('name', '=', $name)->exists();
    }

    public static function getByName($name)
    {
        return PlanArea::where('name', '=', $name)->first();
    }
    
    public static function findByStatus()
    {
        return PlanArea::where('status', '=', 1)->where('_show', '=', 1)->get();
    }

    public static function getOptions()
    {
        $plans = PlanArea::where('status', '=', 1)->get();
        $options = array();
        foreach($plans as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        return $options;
    }

    
}