<?php
class PlanMapController extends AdminController {

    private $uploadPath;
    private $listPosition;
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach');
        $this->uploadPath = public_path() . '/plan/';
        $this->listPosition = array();
    }

    private function getFileName($path)
    {
        $pathList = explode( '/', substr($path, strpos($this->uploadPath, '/plan/')) );
        return end($pathList);
    }

    private function update()
    {
        $list = glob($this->uploadPath . '*', GLOB_ONLYDIR);
        foreach ($list as $key => $l) {
            $name = $this->getFileName($l);
            if( !PlanMap::isExistedName($name) )
            {
                $data = array(
                    'name' => $name
                );
                PlanMap::create($data);
            }
        }
    }

    // private function getY($xPath, $x)
    // {
    //     $list = array();
    //     $yPath = $xPath . $x . '/';
    //     $listY = glob($yPath . '*.png');
    //     foreach ($listY as $key => $ly) {
    //         $y = $this->getFileName($ly);
    //         $y = substr($y, 0, strpos($y, '.png'));
    //         array_push($list, array((int)$x, (int)$y));
    //     }
    //     return $list;
    // }

    // private function positions($photoPath, $zoomName)
    // {
    //     $list = array();
    //     $xPath = $photoPath .  $zoomName . '/';
    //     $listX = glob($xPath . '*', GLOB_ONLYDIR);
    //     foreach ($listX as $key => $lx) {
    //         $x = $this->getFileName($lx);
    //         $list = array_merge($list, $this->getY($xPath, $x));
    //     }
    //     return $list;
    // }

    private function updateStatus($name)
    {
        $plan = PlanMap::getByName($name);
        $plan->status = 1;
        $plan->save();
        return $plan->id;
    }



    public function getIndex()
    {
        $this->update();
        $maps = DB::table('plan_maps')->orderBy('created_at', 'desc')
        ->paginate(Config::get('constant.admin.pager'));
        $pager = $maps->links();
        
        return View::make('admin.map.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Quy hoạch', 'maps' => $maps, 'pager' => $pager));
    }

    public function getUpdate($name = '')
    {
        $plan_id = $this->updateStatus($name);

        // $photoPath = $this->uploadPath .  $name . '/';
        // $listZoom = glob($photoPath . '*', GLOB_ONLYDIR);
        // foreach ($listZoom as $key => $lz) {
        //     $zoomName = $this->getFileName($lz);
        //     $r = $this->positions($photoPath, $zoomName);
        //     $this->listPosition[$zoomName] = $r;
        //     $data = array(
        //         'zoom' => $zoomName,
        //         'position' => json_encode($r),
        //     'plan_id' => $plan_id
        // );
        // DB::table('plan_photo')->insert($data);
        // }

        return Redirect::to('admin/maps')
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
            return Redirect::to('admin/maps/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $plan = PlanMap::find(Input::get('id'));
        $plan->province_id = (int)Input::get('province_id'); 
        $plan->district_id = (int)Input::get('district_id'); 
        $plan->ward_id = (int)Input::get('ward_id'); 
        
        $plan->save();
        
        return Redirect::to('admin/maps')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getEdit($id = 0)
    {
        $plan = PlanMap::find($id);

        return View::make('admin.map.edit')
            ->with(array('plan_id' => $id ))
            ->with(array('plan' => $plan ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Thêm thông tin'));
    }

    public function getDelete($id = 0)
    {
        $plan = PlanMap::find($id);
        $directory = $this->uploadPath .  $plan->name;
        $success = File::deleteDirectory($directory);
        if($success == 1) 
        {
            $plan->delete();
            return Redirect::to('admin/maps')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
        }
        return Redirect::to('admin/maps')
                ->with('message', 'Error')
                ->with('icon', Config::get('constant.admin.alert.error.icon'))
                ->with('type_message', Config::get('constant.admin.alert.error.type'));
    }

    public function getShow($id = 0)
    {
        $plan = PlanMap::find($id);
        $plan->_show = 1;
        $plan->save();
        return Redirect::to('admin/maps')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getHide($id = 0)
    {
        $plan = PlanMap::find($id);
        $plan->_show = 0;
        $plan->save();
        return Redirect::to('admin/maps')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}