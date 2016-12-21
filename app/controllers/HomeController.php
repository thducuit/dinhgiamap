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
	
	public function __construct(Price $e, Cart $c, Payment $p)
	{
		$this->estate = $e;

		$this->cart = $c;

		$this->payment = $p;
	}

	public function view()
	{
		return View::make('default.index.view')
		->with('title', 'Trang chủ')
		->with('current', 1)
		->with('body_class', 'page_home');
	}
	
	
	public function search()
	{
	    return View::make('default.index.map')
	    ->with('address', Input::get('address'))
	    ->with('placeId', Input::get('placeId'))
		->with('title', 'Tìm kiếm')
		->with('body_class', 'page_search');
	}
	
	public function getInfo()
	{
	    $placeId = Input::get('placeId');
	    $place = Marker::where('place_id', '=', $placeId)->get()->first();
	    if($place) 
	    {
	    	$street =  Street::find($place->street_id);
	    	$place->street = ($street) ? $street->get()->first() : null;
	    	$place->price_format = number_format($place->price);
	    	$place->state_price_format = number_format($place->state_price);
	    }
	    return Response::json($place);
	}
	
	
	public function getAddress()
	{
	    return View::make('default.index.address')
		->with('lat', Input::get('lat'))
		->with('lng', Input::get('lng'))
		->with('title', 'address')
		->with('body_class', 'page_search');
	}
	
	public function getMarkers()
	{
	    $lat = Input::get('lat');
	    $lng = Input::get('lng');
	    
	    $radius = 0.1;
	    //search by: Km : 6371
        //           miles: 3959
	    $markers = DB::select( DB::raw("
	    SELECT markers.*, ( 6371 * acos( cos( radians(" . $lat . ") ) * cos( radians(markers.lat) ) * cos( radians(markers.lng) - radians(" . $lng . ") ) + sin( radians( ". $lat ." ) ) * sin( radians( markers.lat ) ) ) ) AS distance 
	    FROM markers
	    HAVING distance > 0 and distance < " . $radius) );
	    
	    return Response::json($markers);
	}
	
	
	public function getPrice()
	{		
		$rules = array(
			'leaving_plan_area' => 'required'
		);
		
		$messages = array(
		    'leaving_plan_area.required' => 'Nhập diện tích đất ở phù hợp quy hoạch',
		    'leaving_plan_area.numeric' => 'Nhập số diện tích đất ở phù hợp quy hoạch',
		);		
		$validation = Validator::make(Input::get(), $rules, $messages);
        
        if( $validation->fails() )
        {
        	$url = '/price?placeId=' . Input::get('place_id').'&street='.Input::get('street');
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

		$result['place_id'] = Input::get('place_id');

		$this->cart->store($result);
		
        return Redirect::to('/result');
		if( empty(Input::get('chooser')) || Input::get('chooser') == 'nologin' )
		{
			Session::put('step', 2);
			return Redirect::to('/payment');
		}
		else
		{
			Session::put('step', 1);
			return Redirect::to('/register');
		}
	}
	
	private function getResult()
	{
		$input = Input::get();
		return $this->estate->result($input);
	}
	
	public function getStructure()
    {
        $options = StructureOption::where('structure_id', '=', Input::get('id'))->get()->toArray();
        return Response::json($options);
    }

    public function getStreet()
    {
    	$streets = Street::all()->toArray();
    	$response = array();
    	foreach ($streets as $key => $s) {
    		$response[$s['id']] = $s['position'];
    	}
    	return Response::json($response);
    }

    public function getStreetPrice()
    {
    	$response = array(
    		'price_format' => 0,
    		'state_price_format' => 0
    	);
    	if(Input::get('id') != 0) {
    		$streets = Street::find((int)Input::get('id'));
	    	$response['price_format'] = number_format($streets->price);
		    $response['state_price_format'] = number_format($streets->state_price);
            $district = District::find($streets->district_id);
            $response['districtName'] = $district->type.' '.$district->name;
    	}
    	return Response::json($response);
    }

    public function showResult()
    {
    	$result = $this->cart->getLastResult();
        $inputThamDinhGia = Session::get('inputThamDinhGia');
      
        $inputThamDinhGia['vitri'] = '';
        $inputThamDinhGia['yeuToKhac'] = '';        
        $inputThamDinhGia['hinhDangThuaDat'] = '';
        $inputThamDinhGia['ketCauChinh'] = '';
        
        $hinhDangThuaDat = AdjustOption::findByGroupId(4, 1, null)->get()->toArray();
        $yeuToKhac = AdjustOption::findByGroupId(16, 1, null)->get()->toArray();
        $chieuNgang = AdjustOption::findByGroupId(1, 1, null)->get()->toArray();
        $dienTichDat = AdjustOption::findByGroupId(3, 1, null)->get()->toArray();   
        $ketCauChinh = Structure::findByAlias('nha-pho')->structure_options()->get()->toArray();
        
        $viTri = AdjustOption::findByGroupId(15, 1, null)->get()->toArray();
        foreach($viTri as $item){
          if($item['id'] == $inputThamDinhGia['selectVitri']){
            $inputThamDinhGia['vitri'] = $item['description'];
          }
        }
        foreach($yeuToKhac as $item){
          if($item['id'] == $inputThamDinhGia['selectYeuToKhac']){
            $inputThamDinhGia['yeuToKhac'] = $item['description'];
          }
        }
        foreach($hinhDangThuaDat as $item){
          if($item['id'] == $inputThamDinhGia['shape']){
            $inputThamDinhGia['hinhDangThuaDat'] = $item['description'];
          }
        }
        foreach($ketCauChinh as $item){
          if($item['price'] == $inputThamDinhGia['structure']){
            $inputThamDinhGia['ketCauChinh'] = $item['structure'];
          }          
          if(count($inputThamDinhGia['structureMore'])){
            foreach($inputThamDinhGia['structureMore'] as &$struct){
              if($item['price'] == $struct){           
                $struct = $item['structure'];
              }
            }
          }
        }
        
     	return View::make('default.page.result')
        ->with(array('title'=> 'kết quả định giá'))
        ->with(array('result'=> $result))
        ->with(array('body_class'=> 'page_thanhtoan'))
        ->with(array('inputThamDinhGia'=> $inputThamDinhGia));
    }
}
