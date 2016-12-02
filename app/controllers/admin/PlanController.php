<?php
class PlanController extends AdminController {

    private $uploadPath;
    private $listPosition;
    
    public function __construct()
    {
        parent::__construct();
        $this->active('quy-hoach');
        $this->uploadPath = public_path() . '/upload/';
        $this->listPosition = array();
    }

    private function getFileName($path)
    {
        $pathList = explode( '/', substr($path, strpos($this->uploadPath, '/upload/')) );
        return end($pathList);
    }

    private function update()
    {
        $list = glob($this->uploadPath . '*', GLOB_ONLYDIR);
        foreach ($list as $key => $l) {
            $name = $this->getFileName($l);
            if( !Plan::isExistedName($name) )
            {
                $data = array(
                    'name' => $name
                );
                Plan::create($data);
            }
        }
    }

    private function getY($xPath, $x)
    {
        $list = array();
        $yPath = $xPath . $x . '/';
        $listY = glob($yPath . '*.png');
        foreach ($listY as $key => $ly) {
            $y = $this->getFileName($ly);
            $y = substr($y, 0, strpos($y, '.png'));
            array_push($list, array((int)$x, (int)$y));
        }
        return $list;
    }

    private function positions($photoPath, $zoomName)
    {
        $list = array();
        $xPath = $photoPath .  $zoomName . '/';
        $listX = glob($xPath . '*', GLOB_ONLYDIR);
        foreach ($listX as $key => $lx) {
            $x = $this->getFileName($lx);
            $list = array_merge($list, $this->getY($xPath, $x));
        }
        return $list;
    }

    private function updateStatus($name)
    {
        $plan = Plan::getByName($name);
        $plan->status = 1;
        $plan->save();
        return $plan->id;
    }



    public function getIndex()
    {
        $this->update();
        $plans = DB::table('plans')->orderBy('created_at', 'desc')
        ->paginate(Config::get('constant.admin.pager'));
        $pager = $plans->links();
        
        return View::make('admin.plan.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Quy hoạch', 'plans' => $plans, 'pager' => $pager));
    }

    public function getUpdate($name = '')
    {
        $plan_id = $this->updateStatus($name);

        $photoPath = $this->uploadPath .  $name . '/';
        $listZoom = glob($photoPath . '*', GLOB_ONLYDIR);
        foreach ($listZoom as $key => $lz) {
            $zoomName = $this->getFileName($lz);
            $r = $this->positions($photoPath, $zoomName);
            $this->listPosition[$zoomName] = $r;
            $data = array(
                'zoom' => $zoomName,
                'position' => json_encode($r),
                'plan_id' => $plan_id
            );
            DB::table('plan_photo')->insert($data);
        }

        return Redirect::to('admin/plans')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));          
    }

    public function getAdd($id = 0)
    {
        $plan = Plan::find($id);

        return View::make('admin.plan.add')
            ->with(array('plan_id' => $id ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Thêm mới'));
    }

    public function getDelete($id = 0)
    {
        $plan = Plan::find($id);
        $directory = $this->uploadPath .  $plan->name;
        $success = File::deleteDirectory($directory);
        if($success == 1) 
        {
            PlanPhoto::deleteByPlanId($plan->id);
            $plan->delete();
            return Redirect::to('admin/plans')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
        }
        return Redirect::to('admin/plans')
                ->with('message', 'Error')
                ->with('icon', Config::get('constant.admin.alert.error.icon'))
                ->with('type_message', Config::get('constant.admin.alert.error.type'));
    }

    public function getShow($id = 0)
    {
        $plan = Plan::find($id);
        $plan->_show = 1;
        $plan->save();
        return Redirect::to('admin/plans')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getHide($id = 0)
    {
        $plan = Plan::find($id);
        $plan->_show = 0;
        $plan->save();
        return Redirect::to('admin/plans')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}