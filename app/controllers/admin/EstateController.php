<?php
class EstateController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('tai-san');
    }

    public function getIndex()
    {
        $estates = DB::table('estates');

        if(!$this->isAdmin())
        {
            $estates = $estates->where('user_id', '=', $this->getUser());
        }

        $estates = $estates->orderBy('id', 'desc')
	    ->paginate(Config::get('constant.admin.pager'));
	    $pager = $estates->links();
	    
        return View::make('admin.estate.view')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Tài sản', 'estates' => $estates, 'pager' => $pager));
    }
    
    public function getAdd()
    {
        return View::make('admin.estate.add')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm tài sản'));
    }

    public function getEdit($id = 0)
    {
        $estate = Estate::find($id);
        return View::make('admin.estate.edit')
            ->with(array('page' => Input::get('page')))
            ->with(array('menu' => $this->menuInstance() ))
            ->with('estate', $estate)
            ->with(array('title'=> 'Cập nhật tài sản'));
    }

    public function getDetail($id = 0)
    {
        $estate = Estate::find($id);
        // $street = Street::find($estate->street_id);
        // $province = Province::find($estate->province_id);
        // $district = District::find($estate->district_id);
        // $ward = Ward::find($estate->ward_id);
        return View::make('admin.estate.show')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('page' => Input::get('page')))
            ->with('estate', $estate)
            // ->with('street', $street)
            // ->with('province', $province)
            // ->with('district', $district)
            // ->with('ward', $ward)
            ->with(array('title'=> 'Chi tiết tài sản'));
    }
    
    
    public function postAdd()
    {
        $rules = array(
            'title' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        );
        
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/estates/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        

        
        $data = array(
                'title' => Input::get('title'),
                'address' => Input::get('address'),
                'lat' => Input::get('lat'),
                'lng' => Input::get('lng'),
                'status' => 0,
                'place_id' => Input::get('place_id'),
                'bedroom' => Input::get('bedroom'),
                'bathroom' => Input::get('bathroom'),
                'areas' => Input::get('areas'),
                'price' => Input::get('price'),
                'cost' => Input::get('cost'),
                'district_id' => Input::get('district_id'),
                'ward_id' => Input::get('ward_id'),
                'province_id' => Input::get('province_id'),
                'wifi' => Input::get('wifi'),
                'banlamviec' => Input::get('banlamviec'),
                'tuquanao' => Input::get('tuquanao'),
                'khoangcachtrannha' => Input::get('khoangcachtrannha'),
                'tulanh' => Input::get('tulanh'),
                'noithatmoi' => Input::get('noithatmoi'),
                'maylanh' => Input::get('maylanh'),
                'bontam' => Input::get('bontam'),
                'tivi' => Input::get('tivi'),
                'tudaugiuong' => Input::get('tudaugiuong'),
                'bantrangdiem' => Input::get('bantrangdiem'),
                'bantivi' => Input::get('bantivi'),
                'kean' => Input::get('kean'),
                'description' => Input::get('description'),
                'contact' => Input::get('contact'),
                'content' => Input::get('content'),
                'gallery' => json_encode(Input::get('file')),
            );
            
            
            
        DB::table('estates')->insert($data);
        
        return Redirect::to('admin/estates')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));            
    }
    
    
    
    
    
    public function postEdit() 
    {
        
        $rules = array(
            'title' => 'required',
            'address' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/estates/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        
        $estate = Estate::find(Input::get('id'));
        $estate->title = Input::get('title'); 
        $estate->address = Input::get('address');  
        $estate->lat = Input::get('lat'); 
        $estate->lng = Input::get('lng'); 
        $estate->place_id = Input::get('place_id'); 
        $estate->bedroom = Input::get('bedroom'); 
        $estate->bathroom = Input::get('bathroom'); 
        $estate->areas = Input::get('areas'); 
        $estate->price = Input::get('price'); 
        $estate->cost = Input::get('cost'); 
        $estate->district_id = Input::get('district_id'); 
        $estate->ward_id = Input::get('ward_id'); 
        $estate->province_id = Input::get('province_id'); 
        $estate->wifi = Input::get('wifi'); 
        $estate->banlamviec = Input::get('banlamviec'); 
        $estate->tuquanao = Input::get('tuquanao'); 
        $estate->khoangcachtrannha = Input::get('khoangcachtrannha'); 
        $estate->noithatmoi = Input::get('noithatmoi'); 
        $estate->tulanh = Input::get('tulanh'); 
        $estate->maylanh = Input::get('maylanh'); 
        $estate->bontam = Input::get('bontam'); 
        $estate->tivi = Input::get('tivi'); 
        $estate->tudaugiuong = Input::get('tudaugiuong'); 
        $estate->bantrangdiem = Input::get('bantrangdiem'); 
        $estate->bantivi = Input::get('bantivi'); 
        $estate->kean = Input::get('kean'); 

        $estate->description = Input::get('description'); 
        $estate->contact = Input::get('contact'); 
        $estate->content = Input::get('content'); 
        $estate->gallery = json_encode(Input::get('file')); 

        
        $estate->save();
        
        return Redirect::to('admin/estates?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $estate = Estate::find($id);
        $estate->delete();
        return Redirect::to('admin/estates?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getShow($id = 0)
    {
        $estate = Estate::find($id);
        $estate->status = 1;
        $estate->save();
        return Redirect::to('admin/estates?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getHide($id = 0)
    {
        $estate = Estate::find($id);
        $estate->status = 0;
        $estate->save();
        return Redirect::to('admin/estates?page=' . Input::get('page'))
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}