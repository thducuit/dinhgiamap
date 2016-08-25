<?php
class InfoController extends BaseController {
    
    public function postDistrict()
    {
        $districts = Province::find(Input::get('id'))->districts;
        return Response::json($districts);
    }
    
    public function postWard()
    {
        $wards = District::find(Input::get('id'))->wards;
        return Response::json($wards);
    }
}