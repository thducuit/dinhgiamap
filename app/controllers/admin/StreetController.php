<?php
class StreetController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        $this->active('khu-vuc');
    }

    public function getIndex() 
    {
        $streets = DB::table('streets');
        
        if(!$this->isAdmin())
        {
            $streets = $streets->where('user_id', '=', $this->getUser());
        }

        $keyword = Input::get('keyword');
        if( !empty($keyword) )
        {
            $streets = $streets->where('name', 'LIKE', "%$keyword%");
        }

        $code = Input::get('code');
        if( !empty($code) )
        {
            $streets = $streets->where('code', 'LIKE', "%$code%");
        }

        $province = (int)Input::get('province');
        if( !empty($province) && $province != 0 )
        {
            $streets = $streets->where('province_id', '=', $province);
        }

        $district = (int)Input::get('district');
        if( !empty($district) && $district != 0 )
        {
            $streets = $streets->where('district_id', '=', $district);
        }

        $ward = (int)Input::get('ward');
        if( !empty($ward) && $ward != 0 )
        {
            $streets = $streets->where('ward_id', '=', $ward);
        }


        $streets = $streets->orderBy('created_at', 'desc')->orderBy('name', 'desc')->orderBy('code', 'asc')
	           ->paginate(Config::get('constant.admin.pager'));
	    $pager = $streets->appends(array('keyword' => $keyword, 'code' => $code, 'province' => $province, 'district' => $district, 'ward' => $ward))->links();
	    
        return View::make('admin.street.view')
            ->with(array('province' => $province,
                        'district' => $district,
                        'ward' => $ward,
                        'keyword' => $keyword,
                        'code' => $code
                ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Đoạn đường', 
                        'pager' => $pager, 
                        'page' => Input::get('page'), 
                        'streets' => $streets)
                  );    
    }
    
    public function getAdd()
    {
        return View::make('admin.street.add')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Thêm mới'));
    }

    public function getEdit($id = 0)
    {
        $street = Street::find($id);
        return View::make('admin.street.edit')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('street', $street)
            ->with(array('title'=> 'Cập nhật đoạn đường'));
    }

    // private function unzip($path)
    // {
    //     try {
    //         @unlink('/home/betadinhgi/domains/beta.dinhgia.biz/public_html/public/upload/2016_09_11_104939_test.zip');
    //         $zip = new ZipArchive;
    //         //echo $path; die();
    //         //$fh = fopen('/home/betadinhgi/domains/beta.dinhgia.biz/public_html/public/upload/2016_09_11_104939_test.zip','r');
            
    //         $res = $zip->open('/home/betadinhgi/domains/beta.dinhgia.biz/public_html/public/upload/2016_09_11_104939_test.zip'); 
    //         if ( $res !== true )
    //             die($zip->getStatusString()."\n");
    //         //dd( $res ); echo 1; die();
    //         if($res == ZipArchive::ER_OPEN){
    //             echo "Unable to open archive";
    //         }
            
    //         $r = $zip->extractTo(public_path() . '/unzip/');
    //         $zip->close();
    //         echo $r; die();
    //     } catch (Exception $e) {
    //         echo $e; die();
    //     }
        
    // }

    private function uploadPhoto($name)
    {
        $file = Input::file('photo_plan');    
        
        $destinationPath = public_path() . '/upload/' . $name;
        
        try
        {
            $file->move($destinationPath);
            //$this->unzip($destinationPath);
        }
        catch(Exception $ex)
        {
            echo '<pre>';
            dd($ex); die();
        }
    }

    
    
    public function postAdd()
    {
        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'state_price' => 'required',
            'district_id' => 'required'
        );

        $messages = array(
            'name.required' => 'Nhập tên khu vực', 
            'code.required' => 'Nhập tên ký hiệu', 
            'price.required' => 'Nhập giá thị trường', 
            'state_price.required' => 'Nhập giá nhà nước', 
            'district_id.required' => 'Chọn quận' 
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            
            return Redirect::to('admin/streets/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }

        $name = null;
        if( Input::hasFile('photo_plan') )
        {
            $name = date('Y_m_d_His_') . Input::file('photo_plan')->getClientOriginalName();
            $this->uploadPhoto($name);
        }
        
        $data = array(
                'name' => Input::get('name'),
                'code' => Input::get('code'),
                'place_id' => Input::get('place_id'),
                'province_id' => Input::get('province_id'),
                'district_id' => Input::get('district_id'),
                'ward_id' => Input::get('ward_id'),
                'start_lat' => Input::get('start_lat'),
                'start_lng' => Input::get('start_lng'),
                'price' => Input::get('price'),
                'state_price' => Input::get('state_price'),
                'position' => Input::get('points'),
                'plan_map_id' => Input::get('plan_map_id'),
                'photo_plan' => $name,
                'user_id' => $this->getUser()

            );
            
        DB::table('streets')->insert($data);
        
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('dinhgia.admin.alert.success.icon'))
                ->with('type_message', Config::get('dinhgia.admin.alert.success.type'));   
    }
    

    public function postEdit()
    {
        $rules = array(
            'name' => 'required',
            'code' => 'required',
            'price' => 'required',
            'state_price' => 'required',
            'district_id' => 'required'
        );
        $messages = array(
            'name.required' => 'Nhập tên khu vực', 
            'code.required' => 'Nhập tên ký hiệu', 
            'price.required' => 'Nhập giá thị trường', 
            'state_price.required' => 'Nhập giá nhà nước', 
            'district_id.required' => 'Chọn quận'
        );
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/streets/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        $street = Street::find(Input::get('id'));
        $street->name = Input::get('name'); 
        $street->code = Input::get('code'); 
        $street->place_id = Input::get('place_id'); 
        $street->province_id = Input::get('province_id'); 
        $street->district_id = Input::get('district_id'); 
        $street->ward_id = Input::get('ward_id'); 
        $street->start_lat = Input::get('start_lat'); 
        $street->start_lng = Input::get('start_lng'); 
        $street->price = Input::get('price');
        $street->state_price = Input::get('state_price');
        $street->plan_map_id = Input::get('plan_map_id');
        $street->position = Input::get('points');
        
        
        $street->save();
        
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $street = Street::find($id);
        $street->delete();
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}