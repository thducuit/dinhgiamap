<?php
class PlanAreaController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach');
    }

    public function getIndex($plan_page_id = 0)
    {
        
        $plans = DB::table('plan_areas');

        if( !empty($plan_page_id) )
        {
            $plans = $plans->where('plan_page_id', '=', $plan_page_id);
        }

        // if(!$this->isAdmin())
        // {
        //     $plan = $plan->where('user_id', '=', $this->getUser());
        // }

        // $keyword = Input::get('keyword');
        // if( !empty($keyword) )
        // {
        //     $markers = $markers->where('name', 'LIKE', "%$keyword%");
        // }

        // $code = Input::get('code');
        // if( !empty($code) )
        // {
        //     $markers = $markers->where('code', 'LIKE', "%$code%");
        // }

        // $province = (int)Input::get('province');
        // if( !empty($province) && $province != 0 )
        // {
        //     $markers = $markers->where('province_id', '=', $province);
        // }

        // $district = (int)Input::get('district');
        // if( !empty($district) && $district != 0 )
        // {
        //     $markers = $markers->where('district_id', '=', $district);
        // }

        // $ward = (int)Input::get('ward');
        // if( !empty($ward) && $ward != 0 )
        // {
        //     $markers = $markers->where('ward_id', '=', $ward);
        // }


        $plans = $plans->orderBy('created_at', 'desc')
               ->paginate(Config::get('constant.admin.pager'));
        $pager = $plans->appends(array('planpage' => $plan_page_id))->links();
	    
        return View::make('admin.planareas.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('title'=>'Số thửa', 
                        'pager' => $pager, 
                        'page' => Input::get('page'), 
                        'plans' => $plans)
                  ); 
    }
    
    public function getAdd($plan_page_id = 0)
    {
        $plan_page = PlanPage::find($plan_page_id);
        $page_name = ($plan_page->name) ? $plan_page->name:'';
        return View::make('admin.planareas.add')
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('page_name' => $page_name ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm thửa'));
    }

    public function getEdit($plan_page_id = 0, $id = 0)
    {
        $plan_page = PlanPage::find($plan_page_id);
        $page_name = ($plan_page->name) ? $plan_page->name:'';

        $plan = PlanArea::find($id);
        return View::make('admin.planareas.edit')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('plan_page_id' => $plan_page_id ))
            ->with(array('page_name' => $page_name ))
            ->with('plan', $plan)
            ->with(array('title'=> 'Cập nhật thửa'));
    }

    public function getShow($id = 0)
    {
        $marker = Marker::find($id);
        $street = Street::find($marker->street_id);
        $province = Province::find($marker->province_id);
        $district = District::find($marker->district_id);
        $ward = Ward::find($marker->ward_id);
        return View::make('admin.marker.show')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('page' => Input::get('page')))
            ->with('marker', $marker)
            ->with('street', $street)
            ->with('province', $province)
            ->with('district', $district)
            ->with('ward', $ward)
            ->with(array('title'=> 'Chi tiết vị trí'));
    }
    
    
    public function postAdd($plan_page_id = 0)
    {
        $rules = array(
            'order' => 'required'
        );
        
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planareas/add/' . $plan_page_id)
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        $data = array(
                'order' => Input::get('order'),
                'position' => Input::get('points'),
                'plan_page_id' => Input::get('plan_page_id'),
                'lat' => Input::get('lat'),
                'lng' => Input::get('lng')
            );
            
            
            
        DB::table('plan_areas')->insert($data);
        
        return Redirect::to('admin/planareas/index/' . $plan_page_id)
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));            
    }
    
    public function postEdit($plan_page_id = 0) 
    {
        
        $rules = array(
            'order' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planareas/edit/' . $plan_page_id . '/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $plan = PlanArea::find(Input::get('id'));
        $plan->order = Input::get('order'); 
        $plan->position = Input::get('points'); 
        $plan->lat = Input::get('lat'); 
        $plan->lng = Input::get('lng'); 

        $plan->save();
        
        return Redirect::to('admin/planareas/index/' . $plan_page_id . '?page=' . Input::get('page'))
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