<?php
class PlanPage extends Eloquent{
    protected $table = 'plan_pages';
    protected $fillable = array('name', '_show');
    public static function isExistedName($name)
    {
        return PlanPage::where('name', '=', $name)->exists();
    }

    public static function getByName($name)
    {
        return PlanPage::where('name', '=', $name)->first();
    }
    
    public static function findByStatus()
    {
        return PlanPage::where('status', '=', 1)->where('_show', '=', 1)->get();
    }

    public static function getOptions()
    {
        $plans = PlanPage::where('status', '=', 1)->get();
        $options = array();
        foreach($plans as $d) {
            $options = array_add($options, $d->id, $d->name);
        }
        dd($options);
        return $options;
    }

    public static function findByWard($ward_id)
    {
        return PlanPage::where('status', '=', 1)->where('_show', '=', 1)->where('ward_id', '=', $ward_id)->first();
    }
}