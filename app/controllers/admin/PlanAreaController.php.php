<?php
class PlanAreaController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach');
    }

    public function getIndex($plan_map_id = 0, $plan_page_id = 0)
    {
        
        $plans = DB::table('plan_areas');

        if( !empty($plan_page_id) )
        {
            $plans = $plans->where('plan_page_id', '=', $plan_page_id);
        }


        $plans = $plans->orderBy('created_at', 'desc')
               ->paginate(Config::get('constant.admin.pager'));
        $pager = $plans->appends(array('planpage' => $plan_page_id))->links();
	    
        return View::make('admin.planareas.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('title'=>'Thửa Quy hoạch', 
                        'pager' => $pager, 
                        'page' => Input::get('page'), 
                        'plans' => $plans)
                  ); 
    }
    
    public function getAdd($plan_page_id = 0)
    {
        $plan_page = PlanPage::find($plan_page_id);
        $plan_map_id = (int)$plan_page->plan_map_id;
        $map = PlanMap::find($plan_map_id);
        $map_name = ($map->name) ? $map->name:'';

        return View::make('admin.planareas.add')
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('page_name' => $map_name ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm thửa'));
    }

    public function getEdit($plan_page_id = 0, $id = 0)
    {
        $plan_page = PlanPage::find($plan_page_id);
        $plan_map_id = (int)$plan_page->plan_map_id;
        $map = PlanMap::find($plan_map_id);
        $map_name = ($map->name) ? $map->name:'';

        $plan = PlanArea::find($id);
        return View::make('admin.planareas.edit')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('page_name' => $map_name ))
            ->with('plan', $plan)
            ->with(array('title'=> 'Cập nhật thửa'));
    }
    
    
    public function postAdd($plan_page_id = 0)
    {
        $rules = array(
            'order' => 'required'
        );
        
        $messages = array(
            'order.required' => 'Chọn số thửa'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planareas/add/' . $plan_page_id)
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        $data = array(
                'order' => Input::get('order'),
                'position' => Input::get('points'),
                'gposition' => Input::get('gpoints'),
                'plan_page_id' => Input::get('plan_page_id'),
                'lat' => Input::get('lat'),
                'glat' => Input::get('glat'),
                'lng' => Input::get('lng'),
                'glng' => Input::get('glng')
            );
            
            
            
        DB::table('plan_areas')->insert($data);
        
        $plan_page = PlanPage::find($plan_page_id);
        $plan_map_id = (int)$plan_page->plan_map_id;

        return Redirect::to('admin/planareas/index/' . $plan_map_id . '/' . $plan_page_id)
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));            
    }
    
    public function postEdit($plan_page_id = 0) 
    {
        
        $rules = array(
            'order' => 'required'
        );
        
        $messages = array(
            'order.required' => 'Chọn số thửa'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planareas/edit/' . $plan_page_id . '/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $plan = PlanArea::find(Input::get('id'));
        $plan->order = Input::get('order'); 
        $plan->position = Input::get('points'); 
        $plan->gposition = Input::get('gpoints'); 
        $plan->lat = Input::get('lat'); 
        $plan->glat = Input::get('glat'); 
        $plan->lng = Input::get('lng'); 
        $plan->glng = Input::get('glng'); 

        $plan->save();

        $plan_page = PlanPage::find($plan_page_id);
        $plan_map_id = (int)$plan_page->plan_map_id;
        
        return Redirect::to('admin/planareas/index/' . $plan_map_id . '/' . $plan_page_id . '?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($plan_page_id = 0, $id = 0) 
    {
        $plan = PlanArea::find($id);
        $plan->delete();
        return Redirect::to('admin/planareas/index/' . $plan_page_id . '?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}