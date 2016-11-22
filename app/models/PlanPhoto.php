<?php
class PlanPhoto extends Eloquent{
    protected $table = 'plan_photo';
    public static function findByPlanId($plan_id)
    {
        return PlanPhoto::where('plan_id', '=', $plan_id)->get();
    }

    public static function deleteByPlanId($plan_id)
    {
    	return PlanPhoto::where('plan_id', '=', $plan_id)->delete();
    }
}