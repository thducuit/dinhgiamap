<?php
class PlanPageController extends AdminController {

    private $uploadPath;
    private $listPosition;
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach-so-to');
        $this->uploadPath = public_path() . '/planpages/';
        $this->listPosition = array();
    }

    private function getFileName($path)
    {
        $pathList = explode( '/', substr($path, strpos($this->uploadPath, '/planpages/')) );
        return end($pathList);
    }

    private function update()
    {
        $list = glob($this->uploadPath . '*', GLOB_ONLYDIR);
        foreach ($list as $key => $l) {
            $name = $this->getFileName($l);
            if( !PlanPage::isExistedName($name) )
            {
                $data = array(
                    'name' => $name
                );
                PlanPage::create($data);
            }
        }
    }

    private function updateStatus($name)
    {
        $plan = PlanPage::getByName($name);
        $plan->status = 1;
        $plan->save();
        return $plan->id;
    }



    public function getIndex()
    {
        $this->update();
        $maps = DB::table('plan_pages')->orderBy('created_at', 'desc')
        ->paginate(Config::get('constant.admin.pager'));
        $pager = $maps->links();
        
        return View::make('admin.planpages.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Quy hoạch', 'maps' => $maps, 'pager' => $pager));
    }

    public function getUpdate($name = '')
    {
        $plan_id = $this->updateStatus($name);

        return Redirect::to('admin/planpages')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));          
    }

    public function postEdit() 
    {
        $rules = array(
            'district_id' => 'required',
            'ward_id' => 'required'
        );

        $messages = array(
            'district_id.required' => 'Chọn quận', 
            'ward_id.required' => 'Chọn phường xã'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/planpages/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $plan = PlanPage::find(Input::get('id'));
        $plan->order = (int)Input::get('order'); 
        $plan->plan_map_id = (int)Input::get('plan_map_id'); 
        
        $plan->save();
        
        return Redirect::to('admin/planpages')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getEdit($id = 0)
    {
        $plan = PlanPage::find($id);

        return View::make('admin.planpages.edit')
            ->with(array('plan_id' => $id ))
            ->with(array('plan' => $plan ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Thêm thông tin'));
    }

    public function getDelete($id = 0)
    {
        $plan = PlanPage::find($id);
        $directory = $this->uploadPath .  $plan->name;
        $success = File::deleteDirectory($directory);
        if($success == 1) 
        {
            $plan->delete();
            return Redirect::to('admin/planpages')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
        }
        return Redirect::to('admin/planpages')
                ->with('message', 'Error')
                ->with('icon', Config::get('constant.admin.alert.error.icon'))
                ->with('type_message', Config::get('constant.admin.alert.error.type'));
    }

    public function getShow($id = 0)
    {
        $plan = PlanPage::find($id);
        $plan->_show = 1;
        $plan->save();
        return Redirect::to('admin/planpages')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getHide($id = 0)
    {
        $plan = PlanPage::find($id);
        $plan->_show = 0;
        $plan->save();
        return Redirect::to('admin/planpages')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}