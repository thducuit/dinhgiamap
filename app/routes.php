<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Create group && user

// Route::get('/creategroup', function() {
//      try
//      {
//         $group = Sentry::createGroup(array(
//             'name' => 'administrator',
//             'permissions' => array(
//                     'create'=> 1,
//                     'read'  => 1,
//                     'update'=> 1,
//                     'delete'=> 1
//                 )
//         ));
//      }
//      catch(Cartalyst\Sentry\Groups\NameRequiredException $e)
//      {
//         echo 'name is required';
//      }
//      catch(Cartalyst\Sentry\Groups\GroupExistsException $e)
//      {
//         echo 'group is existed';
//      }
// });

// Route::get('/createuser', function() {
//      try
//      {
//         $user = Sentry::createUser(array(
//                 'email'=>'admin@gmail.com',
//                 'password'=>'123456',
//                 'activated' => true,
//             ));
            
//         //Find Administrator group
//         $group = Sentry::findGroupByName('administrator');
        
//         // Assign the group to the user
//         $user->addGroup($group);
//      }
//      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
//      {
//         echo 'Login field is required.';
//      }
//      catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
//      {
//         echo 'Password field is required.';
//      }
//      catch (Cartalyst\Sentry\Users\UserExistsException $e)
//      {
//         echo 'User with this login already exists.';
//      }
//      catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
//      {
//         echo 'Group was not found.';
//      }
// });


Route::get('/', 'HomeController@view');
Route::get('/index1', 'HomeController@view');
Route::get('/search', 'HomeController@getSearch');
Route::post('/search', 'HomeController@postSearch');
Route::get('/markers', 'HomeController@getMarkers');
Route::get('/search-markers', 'HomeController@searchMarkers');
Route::get('/info', 'HomeController@getInfo');
Route::get('/thong-tin-tai-khoan.html', 'CustomerController@getInfo');
Route::get('/lien-he.html', 'ContactController@getIndex');
//Route::get('/address', 'HomeController@getAddress');
Route::get('/streets', 'HomeController@getStreet');
Route::post('/streets', 'HomeController@postStreet');
Route::get('/streets/price', 'HomeController@getStreetPrice');




Route::get('/ve-chung-toi.html', function() {
     return View::make('default.page.about')
        ->with(array('title'=> 'Về chúng tôi'))
        ->with('current', 2)
        ->with(array('body_class'=> 'page_xemquihoach'));
});
Route::get('/huong-dan.html', function() {
     return View::make('default.page.guide')
        ->with(array('title'=> 'Hướng dẫn sử dụng'))
        ->with('current', 5)
        ->with(array('body_class'=> 'page_xemquihoach'));
});
Route::get('/dieu-khoan.html', function() {
     return View::make('default.page.law')
        ->with(array('title'=> 'Điều khoản bảo mật'))
        ->with('current', 7)
        ->with(array('body_class'=> 'page_xemquihoach'));
});
Route::get('/chinh-sach.html', function() {
     return View::make('default.page.rule')
        ->with(array('title'=> 'Chính sách sử dụng'))
        ->with('current', 8)
        ->with(array('body_class'=> 'page_xemquihoach'));
});

Route::get('/tai-san-dang-giao-dich.html', function() { 
  $lat = (Input::get('lat'))?Input::get('lat'):0;  
  $lng = (Input::get('lng'))?Input::get('lng'):0;
     return View::make('default.real.index')
        ->with(array('lat'=> $lat))
        ->with(array('lng'=> $lng))
        ->with(array('title'=> 'Tài sản đang giao dịch'))
        ->with('current', 9)
        ->with(array('body_class'=> 'page_search'));
});

Route::get('/chi-tiet-tai-san-dang-giao-dich.html', function() {
    $placeId = Input::get('place');
    $estate = Estate::findByPlaceId($placeId);
     return View::make('default.real.detail')
        ->with(array('title'=> 'Tài sản đang giao dịch'))
        ->with('current', 9)
        ->with('estate', $estate)
        ->with(array('body_class'=> 'page_search'));
});



Route::get('/dinh-gia.html', function() {
     $marker = Marker::findByPlaceId(Input::get('placeId'));
     $districtName = 'Quận 1';
     $childKhoXuong = [];
     if(Input::get('street')){
      $street = Street::find(Input::get('street'));
      $disTrict = District::find($street->district_id);
      $districtName = $disTrict->type.' '.$disTrict->name;
     }
     $address = ($marker) ? $marker->name : Input::get('address');
     
     $viTri = AdjustOption::findByGroupId(15, 1, null)->get()->toArray();
     $hinhDangThuaDat = AdjustOption::findByGroupId(4, 1, null)->get()->toArray();
     $yeuToKhac = AdjustOption::findByGroupId(16, 1, null)->get()->toArray();
     $chieuNgang = AdjustOption::findByGroupId(1, 1, null)->get()->toArray();
     $dienTichDat = AdjustOption::findByGroupId(3, 1, null)->get()->toArray();
//     $ketCauChinh = User::getKetCauChinh();
     $ketCauChinhNhaPho = Structure::findByAlias('nha-pho')->structure_options()->get()->toArray();
     $ketCauChinhCanHo = Structure::findByAlias('can-ho')->structure_options()->get()->toArray();
     $ketCauChinhKhachSan = Structure::findByAlias('khach-san')->structure_options()->get()->toArray();
     $ketCauChinhToaNhaVanPhong = Structure::findByAlias('toa-nha-van-phong')->structure_options()->get()->toArray();
     $ketCauChinhKhoXuong = Structure::findByParent('kho-xuong')->get()->toArray();
     if(count($ketCauChinhKhoXuong)){
      $childKhoXuong = StructureOption::where('structure_id', '=', $ketCauChinhKhoXuong[0]['id'])->get()->toArray();
     }
     $namXayDung = AdjustOption::findByGroupId(9)->get()->toArray();

    $point = array(Input::get('lat'), Input::get('lng'));
    $street = Street::getPolygon($point);
    if( $street != false ) {
      $district = District::find($street['district_id']);
      $street['price_format'] = number_format($street['price']);
      $street['state_price_format'] = number_format($street['state_price']);
      $street['district_format'] =  ($district->type && $district->name) ? $district->type . ' ' . $district->name : '';
    }
    $streetJSON = $street != false ? json_encode($street) : '';

     return View::make('default.page.price')
        ->with('address', $address)
        ->with('placeId', Input::get('placeId'))
        ->with('streetId', Input::get('street'))
        ->with('lat', Input::get('lat'))
	    ->with('lng', Input::get('lng'))
        ->with('streetJSON', $streetJSON)
        ->with(array('title'=> 'Định giá'))
        ->with(array('body_class'=> 'page_search'))     
        ->with(array('viTri'=> $viTri))
        ->with(array('hinhDangThuaDat'=> $hinhDangThuaDat))
        ->with(array('yeuToKhac'=> $yeuToKhac))
        ->with(array('chieuNgang'=> $chieuNgang))
        ->with(array('dienTichDat'=> $dienTichDat))
        ->with(array('districtName' => $districtName))
        ->with(array('ketCauChinhNhaPho' => $ketCauChinhNhaPho))
        ->with(array('ketCauChinhCanHo' => $ketCauChinhCanHo))             
        ->with(array('ketCauChinhKhachSan' => $ketCauChinhKhachSan))
        ->with(array('ketCauChinhToaNhaVanPhong' => $ketCauChinhToaNhaVanPhong))
        ->with(array('ketCauChinhKhoXuong' => $ketCauChinhKhoXuong))
        ->with(array('childKhoXuong' => $childKhoXuong))             
        ->with(array('namXayDung' => $namXayDung));
});

Route::post('/xem-quy-hoach.html', function() {
    $rules = array(
        'district_id' => 'required',
        'ward_id' => 'required'
    );

    $messages = array(
        'district_id.required' => 'Chọn quận', 
        'ward_id.required' => 'Chọn phường xã'
    );
    $imageMapFrom = 'planMap';
    $inputs = Input::get();    
    $validation = Validator::make($inputs, $rules, $messages);
    
    if( $validation->fails() )
    {
        return Redirect::to('/xem-quy-hoach.html')
        ->withInput(Input::all())        
        ->withErrors($validation);
    }
    $plan = PlanMap::findByWard(Input::get('ward_id'));
    $planPage = FALSE;
    $planArea = false;
    if($inputs['soTo'] && $plan){
      $planPage = PlanPage::where('order', '=', $inputs['soTo'])->where('plan_map_id', '=', $plan->id)->first();
      if($planPage && $inputs['soThua']){
        $planArea = PlanArea::where('plan_page_id', '=', $planPage->id)->where('order', '=', $inputs['soThua'])->first();
      }
    }
    $coordinateSoThua = '';
    $addressSoThua = '';
    $placeIdSoThua = '';
    $name = '';
    $positionSoTo = '';
    if($plan){
      $name = $plan->name;
    }     
    if($planPage){
      $positionSoTo = $planPage->position;            
      if($planArea){        
        $coordinateSoThua = [
          'lat' => $planArea->lat,
          'lng' => $planArea->lng
        ];
        $addressSoThua = $planArea->address;
        $placeIdSoThua = $planArea->place_id;
      }
    }     
    return Redirect::to('/xem-quy-hoach.html')
            ->withName($name)
            ->with('positionSoTo', $positionSoTo)              
            ->with('coordinateSoThua', $coordinateSoThua)  
            ->with('addressSoThua', $addressSoThua)  
            ->with('placeIdSoThua', $placeIdSoThua)  
            ->withInput(Input::all());
    
});

Route::post('/xem-quy-hoach-v2.html', function() {
    
    $plan = PlanMap::findByWard(Input::get('ward_id'));

    return Response::json($plan);
    
});

Route::post('/planmap', function() {
    $type = Input::get('type');
    $id = Input::get('id');
    $result;
    if($type == 'marker') {
        $result = Marker::find($id);
        $result->name =  PlanMap::getName($result->plan_map_id);

    }else {
        $result = Street::find($id);
        $result->name =  PlanMap::getName($result->plan_map_id);
    }
    return Response::json($result);
});

Route::post('/district', function() {
    $districts = District::getByProvince(Input::get('id'));
    return Response::json($districts);
});
Route::post('/ward', function() {
    if(Input::get('id') == 0)
    {
        return Response::json(array());
    }
    $wards = District::find(Input::get('id'))->wards;
    return Response::json($wards);
});
Route::get('/reals', function() {
    $lat = Input::get('lat');
    $lng = Input::get('lng');
    if($lat && $lng){
      $radius = 0.5;    
      $markers = DB::select(DB::raw("
          SELECT es.*, ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians(es.lat) ) * cos( radians(es.lng) - radians(" . $lng . ") ) + sin( radians( " . $lat . " ) ) * sin( radians( es.lat ) ) ) ) AS distance 
          FROM ".Estate::TABLE_NAME." AS es
          HAVING distance > 0 and distance < " . $radius));
      return Response::json( $markers );
    }else{
      return Response::json( Estate::where('status', '=', 1)->get() );
    }
});
Route::get('/xem-quy-hoach.html', function() {
     return View::make('default.page.plan')
        ->with(array('title'=> 'Xem quy hoạch'))
        ->with('current', 3)
        ->with(array('body_class'=> 'page_xemquihoach'));
});

Route::controller('/payment', 'PaymentController');
Route::controller('/customer', 'CustomerController');

Route::get('/hoi-dap.html', function() {
     return View::make('default.page.qa')
        ->with(array('title'=> 'Câu hỏi thường gặp'))
        ->with('current', 4)
        ->with(array('body_class'=> 'page_contact'));
});
Route::get('/ket-qua-dinh-gia.html', 'HomeController@showResult');
Route::get('/register', function() {  
     return View::make('default.page.register')
        ->with(array('title'=> 'Đăng ký'))
        ->with(array('body_class'=> 'page_contact'));
});
Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::get('/active', 'AuthController@active');
Route::post('/login-ajax', 'AuthController@loginAjax');
Route::post('/register-ajax', 'AuthController@registerAjax');

Route::get('/logout', 'AuthController@logout');

Route::get('/structure', 'HomeController@getStructure');

Route::post('/the-price', 'HomeController@getPrice');
Route::post('/don-gia-so-bo', function(){      
  $giaSauDieuChinh = floatval(Input::get('giaThiTruong')) + floatval(Input::get('giaThiTruong')) * (floatval(Input::get('viTri')) + floatval(Input::get('hinhDangThuaDat')) + floatval(Input::get('chieuNgang')) + floatval(Input::get('dienTichDat'))) / 100;
  $giaTriDat = floatval(Input::get('dienTichDatText')) * $giaSauDieuChinh;
  $giaTriCTXD = (Input::get('ketCauChinh') * Input::get('dienTichSanXD') * Input::get('namXayDung')) / 100;
  $tongGiaTriSoBo = floatval($giaTriDat) + floatval($giaTriCTXD);
  return Response::json(array(
      'giaSauDieuChinh' => $giaSauDieuChinh,
      'giaTriDat' => $giaTriDat,
      'giaTriCTXD' => $giaTriCTXD,
      'tongGiaTriSoBo' => $tongGiaTriSoBo
  ));        
});

Route::group(array('before' => 'dg_admin_authentication'), function() {
     Route::controller('admin/info', 'InfoController');
     Route::controller('admin/streets', 'StreetController');
     Route::controller('admin/markers', 'MarkerController');
     Route::controller('admin/questions', 'QuestionController');
     Route::controller('admin/maps', 'PlanMapController');
     Route::controller('admin/planpages', 'PlanPageController');
     Route::controller('admin/planareas', 'PlanAreaController');
     Route::controller('admin/plans', 'PlanController');
     Route::controller('admin/contacts', 'AdminContactController');
     Route::controller('admin/users', 'UserController');
     Route::controller('admin/estates', 'EstateController');
     Route::controller('admin/customers', 'CustomerController');
     Route::get('admin/dashboard', 'AdminController@dashboard');
});

Route::controller('admin', 'AdminController');

Route::controller('/contact', 'ContactController');