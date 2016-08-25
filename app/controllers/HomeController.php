<?php
use Ducnguyen\Storage\Price\PriceRepository as Price;

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
	
	public function __construct(Price $e)
	{
		$this->estate = $e;
	}

	public function view()
	{
		//$this->estate->fix();
		return View::make('default.index.view')
		->with('title', 'home page')
		->with('body_class', 'page_home');
	}
	
	
	public function search()
	{
	    return View::make('default.index.map')
	    ->with('address', Input::get('address'))
	    ->with('placeId', Input::get('placeId'))
		->with('title', 'search')
		->with('body_class', 'page_search');
	}
	
	public function getInfo()
	{
	    $placeId = Input::get('placeId');
	    $place = Marker::where('place_id', '=', $placeId)->get()->first();
	    if($place) 
	    {
	    	$street =  Street::find($place->street_id)->get()->first();
	    	$place->street = $street;
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
		return Redirect::to('/result');
	}
	
	
    // 	public function search()
    // 	{
    // 		$k = 'test';
    // 		$streets = DB::table('streets')->get();
    // 		$dataResponse = array();
    // 		foreach ($streets as $street) {
    // 			$dataResponse[] = (object)array( 'value'=> $street->name, 'data'=> $street->id );
    // 		}
    		
    // 		return Response::json( array('query'=> $k, 'suggestions' => $dataResponse) );
    // 	}
    
    // public function getMarkers()
    // {
    //     $dataResponse = array();
    //     $placeId = Input::get('placeId');
    //     if( empty($placeId) )
    //     {
    //         return Response::json(
    //                 array(
    //                     'success' => false,
    //                     'message' => 'street id is empty',
    //                     'data' => array()
    //                 )
    //             );
    //     }
        
    //     $street = Street::where('place_id', '=', $placeId)->get()->toArray();
    //     //$street['markers'] = Street::find($streetId)->markers->toArray();
        
    //     return Response::json(
    //             array(
    //                 'success' => true,
    //                 'message' => '',
    //                 'data' => $street
    //                 )
    //         );
    // }
}
