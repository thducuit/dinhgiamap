<?php

use Ducnguyen\Storage\Price\PriceRepository as Price;
use Ducnguyen\Storage\Cart\CartRepository as Cart;
use Ducnguyen\Storage\Payment\PaymentRepository as Payment;

class HomeController extends BaseController {
  /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
   */

  private $estate;
  private $cart;
  private $payment;

  public function __construct(Price $e, Cart $c, Payment $p) {
    $this->estate = $e;

    $this->cart = $c;

    $this->payment = $p;
  }

  public function view() {
    return View::make('default.index.view')
                    ->with('title', 'Trang chủ')
                    ->with('current', 1)
                    ->with('body_class', 'page_home');
  }

  public function getSearch() {
    $point = array(Input::get('lat'), Input::get('lng'));
    $street = Street::getPolygon($point);
    if( $street != false ) {
      $district = District::find($street['district_id']);
      $street['price_format'] = number_format($street['price']);
      $street['state_price_format'] = number_format($street['state_price']);
      $street['district_format'] =  ($district->type && $district->name) ? $district->type . ' ' . $district->name : '';
    }
    $streetJSON = $street != false ? json_encode($street) : '';
    
    return View::make('default.index.map')
                    ->with('address', Input::get('address'))
                    ->with('placeId', Input::get('placeId'))
                    ->with('lat', Input::get('lat'))
                    ->with('lng', Input::get('lng'))
                    ->with('streetJSON', $streetJSON)
                    ->with('title', 'Tìm kiếm')
                    ->with('body_class', 'page_search');
  }

  public function postSearch() {
    $point = array(Input::get('lat'), Input::get('lng'));
    $street = Street::getPolygon($point);
    if( $street != false ) {
      $district = District::find($street['district_id']);
      $street['price_format'] = number_format($street['price']);
      $street['state_price_format'] = number_format($street['state_price']);
      $street['district_format'] =  ($district->type && $district->name) ? $district->type . ' ' . $district->name : '';
    }
    
    return Response::json($street);     
  }

  

  public function getInfo() {
    $placeId = Input::get('placeId');
    $place = Marker::where('place_id', '=', $placeId)->get()->first();
    if ($place) {
      $street = Street::find($place->street_id);
      $place->street = ($street) ? $street->get()->first() : null;
      $place->price_format = number_format($place->price);
      $place->state_price_format = number_format($place->state_price);
    }
    return Response::json($place);
  }

  public function getAddress() {
    return View::make('default.index.address')
                    ->with('lat', Input::get('lat'))
                    ->with('lng', Input::get('lng'))
                    ->with('title', 'address')
                    ->with('body_class', 'page_search');
  }

  public function getMarkers() {
    $lat = Input::get('lat');
    $lng = Input::get('lng');

    $radius = 0.1;
    //search by: Km : 6371
    //           miles: 3959
    $markers = DB::select(DB::raw("
	    SELECT markers.*, ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians(markers.lat) ) * cos( radians(markers.lng) - radians(" . $lng . ") ) + sin( radians( " . $lat . " ) ) * sin( radians( markers.lat ) ) ) ) AS distance 
	    FROM markers
	    HAVING distance > 0 and distance < " . $radius));

    return Response::json($markers);
  }

  public function searchMarkers() {
    if (Input::get('position')) {
      $markers = Marker::where('name', 'like', '%' . Input::get('position') . '%')->limit(5)->get();
      return Response::json($markers);
    }
  }

  public function getPrice() {

    $rules = array(
        'total_area' => 'required',
        'horizontal' => 'required',
        'leaving_plan_area' => 'required',
    );

    $messages = array(
        'total_area.required' => 'Nhập tổng diện tích',
        'total_area.numeric' => 'Nhập số tổng diện tích',
        'horizontal.required' => 'Nhập chiều ngang mặt tiền',
        'horizontal.numeric' => 'Nhập số chiều ngang mặt tiền',
        'leaving_plan_area.required' => 'Nhập diện tích đất ở phù hợp quy hoạch ',
        'leaving_plan_area.numeric' => 'Nhập số diện tích đất ở phù hợp quy hoạch'
    );
    $validation = Validator::make(Input::get(), $rules, $messages);
    if ($validation->fails()) {

      $url = '/dinh-gia.html?placeId=' . Input::get('place_id') . '&address=' . Input::get('address') . '&street=' . Input::get('street_id');
      return Redirect::to($url)
                      ->withInput(Input::all())
                      ->withErrors($validation)
                      ->withType(Input::get('type'));
    }
    $inputThamDinhGia = Input::get();

    unset($inputThamDinhGia['_token']);
    unset($inputThamDinhGia['address']);
    unset($inputThamDinhGia['textDistrict']);
    unset($inputThamDinhGia['place_id']);
    unset($inputThamDinhGia['street']);

    Session::put('inputThamDinhGia', $inputThamDinhGia);

    $result = $this->getResult();

    if(Sentry::check()) {
      $user = Sentry::getUser();
      $data = array(
        'data' => serialize(Input::get()),
        'user_id' => $user->id
      );
      DB::table('customer_logs')->insert($data);
    }

    $result['place_id'] = Input::get('place_id');

    $this->cart->store($result);

    return Redirect::to('/ket-qua-dinh-gia.html')
                ->with('address', Input::get('address') )
                ->with('place_id', Input::get('place_id') );
    if (empty(Input::get('chooser')) || Input::get('chooser') == 'nologin') {
      Session::put('step', 2);
      return Redirect::to('/payment');
    } else {
      Session::put('step', 1);
      return Redirect::to('/register');
    }
  }

  private function getResult() {
    $input = Input::get();
    return $this->estate->result($input);
  }

  public function getStructure() {
    $options = StructureOption::where('structure_id', '=', Input::get('id'))->get()->toArray();
    return Response::json($options);
  }

  public function getStreet() {
    $streets = Street::all()->toArray();
    $response = array();
    foreach ($streets as $key => $s) {
      $district = District::find($s['district_id']);
      $response[$s['id']] = array(
        'position' => $s['position'],
        'price_format' => number_format($s['price']),
        'state_price_format' => number_format($s['state_price']),
        'price' => ($s['price']),
        'state_price' => ($s['state_price']),
        'district_format'=> ($district->type && $district->name) ? $district->type . ' ' . $district->name : '',
        'name' => $s['code']
      );
    }
    return Response::json($response);
  }

  public function postStreet() {
    $district_id = (int)Input::get('district');
    $response = array();
    if(empty($district_id)) {
      return Response::json($response);
    }
    $streets = Street::getByDistrict($district_id)->toArray();
    foreach ($streets as $key => $s) {
      $district = District::find($s['district_id']);
      $response[$s['id']] = array(
        'position' => $s['position'],
        'price_format' => number_format($s['price']),
        'state_price_format' => number_format($s['state_price']),
        'price' => ($s['price']),
        'state_price' => ($s['state_price']),
        'district_format'=> ($district->type && $district->name) ? $district->type . ' ' . $district->name : '',
        'name' => $s['code']
      );
    }
    return Response::json($response);
  }

  public function getStreetPrice() {
    $response = array(
        'price_format' => 0,
        'state_price_format' => 0
    );
    if (Input::get('id') != 0) {
      $streets = Street::find((int) Input::get('id'));
      $response['price_format'] = number_format($streets->price);
      $response['state_price_format'] = number_format($streets->state_price);
      $district = District::find($streets->district_id);
      $response['districtName'] = $district->type . ' ' . $district->name;
    }
    return Response::json($response);
  }

  public function showResult() {
    $result = $this->cart->getLastResult();
    $inputThamDinhGia = Session::get('inputThamDinhGia');

    $inputThamDinhGia['vitri'] = '';
    $inputThamDinhGia['yeuToKhac'] = '';
    $inputThamDinhGia['hinhDangThuaDat'] = '';
    $inputThamDinhGia['ketCauChinh'] = '';
    $ketCauChinh = [];
    $hinhDangThuaDat = AdjustOption::findByGroupId(4, 1, null)->get()->toArray();
    $yeuToKhac = AdjustOption::findByGroupId(16, 1, null)->get()->toArray();
    $chieuNgang = AdjustOption::findByGroupId(1, 1, null)->get()->toArray();
    $dienTichDat = AdjustOption::findByGroupId(3, 1, null)->get()->toArray();
    if ($inputThamDinhGia['type'] == 'house') {
      $ketCauChinh = Structure::findByAlias('nha-pho')->structure_options()->get()->toArray();
    } else if ($inputThamDinhGia['type'] == 'flat') {
      $ketCauChinh = Structure::findByAlias('can-ho')->structure_options()->get()->toArray();
    } else if ($inputThamDinhGia['type'] == 'hotel') {
      $ketCauChinh = Structure::findByAlias('khach-san')->structure_options()->get()->toArray();
    } else if ($inputThamDinhGia['type'] == 'office') {
      $ketCauChinh = Structure::findByAlias('toa-nha-van-phong')->structure_options()->get()->toArray();
    } else if ($inputThamDinhGia['type'] == 'warehouse' && $inputThamDinhGia['structure_parent']) {
      $ketCauChinh = StructureOption::where('structure_id', '=', $inputThamDinhGia['structure_parent']);
      if (isset($inputThamDinhGia['structureParentMore']) && count($inputThamDinhGia['structureParentMore'])) {
        foreach ($inputThamDinhGia['structureParentMore'] as $item) {
          $ketCauChinh = $ketCauChinh->orWhere('structure_id', '=', $item);
        }
      }
      $ketCauChinh = $ketCauChinh->get()->toArray();
    }

    $viTri = AdjustOption::findByGroupId(15, 1, null)->get()->toArray();
    foreach ($viTri as $item) {
      if ($item['id'] == $inputThamDinhGia['selectVitri']) {
        $inputThamDinhGia['vitri'] = $item['description'];
      }
    }

    if (isset($inputThamDinhGia['selectYeuToKhac'])) {
      foreach ($yeuToKhac as $item) {
        foreach ($inputThamDinhGia['selectYeuToKhac'] as $yeuTo) {
          if ($item['id'] == $yeuTo) {
            $inputThamDinhGia['yeuToKhac'] .= $item['description'] . ', ';
          }
        }
      }
    }

    foreach ($hinhDangThuaDat as $item) {
      if ($item['id'] == $inputThamDinhGia['shape']) {
        $inputThamDinhGia['hinhDangThuaDat'] = $item['description'];
      }
    }
    if (isset($inputThamDinhGia['structure'])) {
      foreach ($ketCauChinh as $item) {
        if ($item['price'] == $inputThamDinhGia['structure']) {
          $inputThamDinhGia['ketCauChinh'] = $item['structure'];
        }
        if (isset($inputThamDinhGia['structureMore']) && count($inputThamDinhGia['structureMore'])) {
          foreach ($inputThamDinhGia['structureMore'] as &$struct) {
            if ($item['price'] == $struct) {
              $struct = $item['structure'];
            }
          }
        }
      }
    }

    //store history in to DB
    
    return View::make('default.page.result')
                    ->with(array('title' => 'Kết quả định giá'))
                    ->with(array('result' => $result))
                    ->with(array('body_class' => 'page_search'))
                    ->with(array('inputThamDinhGia' => $inputThamDinhGia));
  }

}
