<?php
class MarkerController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('dia-chi');
    }

    public function getIndex()
    {
        $markers = DB::table('markers');

        if(!$this->isAdmin())
        {
            $markers = $markers->where('user_id', '=', $this->getUser());
        }

        $keyword = Input::get('keyword');
        if( !empty($keyword) )
        {
            $markers = $markers->where('name', 'LIKE', "%$keyword%");
        }

        $code = Input::get('code');
        if( !empty($code) )
        {
            $markers = $markers->where('code', 'LIKE', "%$code%");
        }

        $province = (int)Input::get('province');
        if( !empty($province) && $province != 0 )
        {
            $markers = $markers->where('province_id', '=', $province);
        }

        $district = (int)Input::get('district');
        if( !empty($district) && $district != 0 )
        {
            $markers = $markers->where('district_id', '=', $district);
        }

        $ward = (int)Input::get('ward');
        if( !empty($ward) && $ward != 0 )
        {
            $markers = $markers->where('ward_id', '=', $ward);
        }


        $markers = $markers->orderBy('created_at', 'desc')->orderBy('name', 'desc')
               ->paginate(Config::get('constant.admin.pager'));
        $pager = $markers->appends(array('keyword' => $keyword,  'province' => $province, 'district' => $district, 'ward' => $ward))->links();


     //    $markers = $markers->orderBy('id', 'desc')
	    // ->paginate(Config::get('constant.admin.pager'));
	    // $pager = $markers->links();
	    
        return View::make('admin.marker.view')
            ->with(array('province' => $province,
                        'district' => $district,
                        'ward' => $ward,
                        'keyword' => $keyword,
                ))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=>'Vị trí', 
                        'pager' => $pager, 
                        'page' => Input::get('page'), 
                        'markers' => $markers)
                  ); 
    }
    
    public function getAdd()
    {
        return View::make('admin.marker.add')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm vị trí'));
    }

    public function getEdit($id = 0)
    {
        $marker = Marker::find($id);
        return View::make('admin.marker.edit')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with('marker', $marker)
            ->with(array('title'=> 'Cập nhật vị trí'));
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
    
    
    public function postAdd()
    {
        $rules = array(
            'name' => 'required',
            // 'street_id' => 'required',
            'price' => 'required',
            'state_price' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        );
        
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/markers/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        // $price = Input::get('price');
        // if(empty($price)) 
        // {
        //     if( Input::get('street_id') )
        //     {
        //         $street = Street::find(Input::get('street_id'))->toArray();
        //         $price = $street['price'];
        //     }
        // }
        
        
        $name = null;
        if( Input::hasFile('plan_photo') )
        {
            $name = date('Y_m_d_His_') . Input::file('plan_photo')->getClientOriginalName();
            $this->uploadPhoto($name);
        }
        
        $data = array(
                'name' => Input::get('name'),
                'place_id' => Input::get('place_id'),
                'lat' => Input::get('lat'),
                'lng' => Input::get('lng'),
                'used_acreage' => Input::get('used_acreage'),
                'land_acreage' => Input::get('land_acreage'),
                'sale_price' => Input::get('sale_price'),
                'street_id' => Input::get('street_id'),
                'province_id' => Input::get('province_id'),
                'district_id' => Input::get('district_id'),
                'ward_id' => Input::get('ward_id'),
                'class_field' => Input::get('class_field'),
                'plan_field' => Input::get('plan_field'),
                'state_price' => Input::get('state_price'),
                'price' => Input::get('price'),
                'photo_plan' => $name,
                'user_id' => $this->getUser()
            );
            
            
            
        DB::table('markers')->insert($data);
        
        return Redirect::to('admin/markers')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));            
    }
    
    private function uploadPhoto($name)
    {
        $file = Input::file('plan_photo');    
        
        $destinationPath = public_path() . '/upload/' . $name;
        
        try
        {
            $file->move($destinationPath);
        }
        catch(Exception $ex)
        {
            echo '<pre>';
            dd($ex); die();
        }
    }
    
    
    
    public function postEdit() 
    {
        
        $rules = array(
            'name' => 'required',
            'street_id' => 'required',
            'price' => 'required',
            'state_price' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        );
        
        $inputs = Input::get();
        
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/markers/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        // $price = Input::get('price');
        // if(empty($price)) 
        // {
        //     if( Input::get('street_id') )
        //     {
        //         $street = Street::find(Input::get('street_id'))->toArray();
        //         $price = $street['price'];
        //     }
        // }

        $name = null;
        if( Input::hasFile('plan_photo') )
        {
            $name = date('Y_m_d_His_') . Input::file('plan_photo')->getClientOriginalName();
            $this->uploadPhoto($name);
        }
        
        $marker = Marker::find(Input::get('id'));
        $marker->name = Input::get('name'); 
        $marker->place_id = Input::get('place_id'); 
        $marker->street_id = Input::get('street_id'); 
        $marker->lat = Input::get('lat'); 
        $marker->lng = Input::get('lng'); 
        $marker->used_acreage = Input::get('used_acreage'); 
        $marker->land_acreage = Input::get('land_acreage'); 
        $marker->price = Input::get('price'); 
        $marker->sale_price = Input::get('sale_price'); 
        $marker->province_id = Input::get('province_id'); 
        $marker->district_id = Input::get('district_id'); 
        $marker->ward_id = Input::get('ward_id'); 
        $marker->class_field = Input::get('class_field'); 
        $marker->plan_field = Input::get('plan_field'); 
        $marker->state_price = Input::get('state_price'); 
        $marker->photo_plan = $name; 
        $marker->save();        
        return Redirect::to('admin/markers?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $marker = Marker::find($id);
        $marker->delete();
        return Redirect::to('admin/markers?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}