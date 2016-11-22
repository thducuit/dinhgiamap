<?php
class InfoController extends BaseController {
    
    public function postDistrict()
    {
        if(Input::get('id') == 0)
        {
            return Response::json(array());
        }
        //$districts = Province::find(Input::get('id'))->districts;
        $districts = District::getByProvince(Input::get('id'));
        return Response::json($districts);
    }
    
    public function postWard()
    {
        if(Input::get('id') == 0)
        {
            return Response::json(array());
        }
        $wards = District::find(Input::get('id'))->wards;
        return Response::json($wards);
    }
    
    public function postPrice()
    {
        $street = Street::find(Input::get('id'));
        return Response::json($street);
    }

    public function postPlan()
    {
        $id = (int)Input::get('id');
        if($id == 0) {
            $plans = Plan::findByStatus()->toArray();
            foreach ($plans as $key => $p) {
                # code...
                $plans[$key]['position'] = array();
                $planPhoto = PlanPhoto::findByPlanId($p['id'])->toArray();
                for($i = 0; $i<count($planPhoto); $i++ ) {
                    $pp = $planPhoto[$i];
                    $plans[$key]['position'][$pp['zoom']] = json_decode($pp['position'], true);
                }
            }
            return Response::json($plans);
        }
        else
        {

            $plan= Plan::find($id)->toArray();
            //dd($plan); die();
            $plan['position'] = array();
            $planPhoto = PlanPhoto::findByPlanId($id)->toArray();
            for($i = 0; $i<count($planPhoto); $i++ ) {
                $pp = $planPhoto[$i];
                $plan['position'][$pp['zoom']] = json_decode($pp['position'], true);
            }
            return Response::json($plan);
        }
        
    }
    
}