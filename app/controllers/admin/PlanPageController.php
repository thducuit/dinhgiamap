<?php
class PlanPageController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach');
    }

    public function getIndex($plan_map_id = 0)
    {
        
        $plans = DB::table('plan_pages');

        if( !empty($plan_map_id) )
        {
            $plans = $plans->where('plan_map_id', '=', $plan_map_id);
        }


        $plans = $plans->orderBy('created_at', 'desc')
               ->paginate(Config::get('constant.admin.pager'));
        $pager = $plans->appends(array('planmap' => $plan_map_id))->links();
        
        return View::make('admin.planpages.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_map_id' => $plan_map_id ))
            ->with(array('title'=>'Tờ Quy Hoạch', 
                        'pager' => $pager, 
                        'page' => Input::get('page'), 
                        'plans' => $plans)
                  ); 
    }
    
    public function getAdd($plan_map_id = 0)
    {
        $map = PlanMap::find($plan_map_id);
        $map_name = ($map->name) ? $map->name:'';
        return View::make('admin.planpages.add')
            ->with(array('plan_map_id' => $plan_map_id ))
            ->with(array('map_name' => $map_name ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm tờ'));
    }

    public function getEdit($plan_map_id = 0, $id = 0)
    {
        $map = PlanMap::find($plan_map_id);
        $map_name = ($map->name) ? $map->name:'';

        $plan = PlanPage::find($id);

        return View::make('admin.planpages.edit')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_map_id' => $plan_map_id ))
            ->with(array('map_name' => $map_name ))
            ->with('plan', $plan)
            ->with(array('title'=> 'Cập nhật tờ'));
    }
    
    
    public function postAdd($plan_map_id = 0)
    {
        $rules = array(
            'order' => 'required'
        );
        
        $messages = array(
            'order.required' => 'Chọn số tờ'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planpages/add/' . $plan_map_id)
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        $data = array(
                'order' => Input::get('order'),
                'position' => Input::get('points'),
                'gposition' => Input::get('gpoints'),
                'plan_map_id' => Input::get('plan_map_id')
            );
            
            
            
        DB::table('plan_pages')->insert($data);
        
        return Redirect::to('admin/planpages/index/' . $plan_map_id)
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));            
    }
    
    public function postEdit($plan_map_id = 0) 
    {
        
        $rules = array(
            'order' => 'required'
        );
        
        $messages = array(
            'order.required' => 'Chọn số tờ'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planpages/edit/' . $plan_map_id . '/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $plan = PlanPage::find(Input::get('id'));
        $plan->order = Input::get('order'); 
        $plan->position = Input::get('points');
        $plan->gposition = Input::get('gpoints');

        $plan->save();
        
        return Redirect::to('admin/planpages/index/' . $plan_map_id . '?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($plan_map_id = 0, $id = 0) 
    {
        $plan = PlanPage::find($id);
        $plan->delete();
        return Redirect::to('admin/planpages/index/' . $plan_map_id . '?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}