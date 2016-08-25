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

Route::get('/', 'HomeController@view');
Route::get('/index', 'HomeController@view');
Route::get('/search', 'HomeController@search');
Route::get('/markers', 'HomeController@getMarkers');
Route::get('/info', 'HomeController@getInfo');
Route::get('/address', 'HomeController@getAddress');

Route::controller('/contact', 'ContactController');

Route::get('/about', function() {
     return View::make('default.page.about')
        ->with(array('title'=> 'về chúng tôi'))
        ->with(array('body_class'=> 'page_xemquihoach'));
});
Route::get('/price', function() {
     return View::make('default.page.price')
        ->with('address', Input::get('address'))
	   ->with('placeId', Input::get('placeId'))
        ->with(array('title'=> 'định giá'))
        ->with(array('body_class'=> 'page_search'));
});
Route::get('/plan', function() {
     return View::make('default.page.plan')
        ->with(array('title'=> 'xem quy hoạch'))
        ->with(array('body_class'=> 'page_xemquihoach'));
});
Route::get('/payment', function() {
     return View::make('default.page.payment')
        ->with(array('title'=> 'thanh toán'))
        ->with(array('body_class'=> 'page_thanhtoan'));
});
Route::get('/payment2', function() {
     return View::make('default.page.payment2')
        ->with(array('title'=> 'hình thức thanh toán'))
        ->with(array('body_class'=> 'page_thanhtoan'));
});
Route::get('/payment3', function() {
     return View::make('default.page.payment3')
        ->with(array('title'=> 'hoàn tất thanh toán'))
        ->with(array('body_class'=> 'page_thanhtoan'));
});
Route::get('/question', function() {
     return View::make('default.page.qa')
        ->with(array('title'=> 'câu hỏi thường gặp'))
        ->with(array('body_class'=> 'page_contact'));
});
Route::get('/result', function() {
     return View::make('default.page.result')
        ->with(array('title'=> 'kết quả định giá'))
        ->with(array('body_class'=> 'page_contact'));
});

Route::post('/the-price', 'HomeController@getPrice');

Route::get('admin/dashboard', function() {
     return View::make('admin.dashboard')
        ->with(array('title'=> 'trang chủ'));
});


Route::controller('admin/info', 'InfoController');
Route::controller('admin/streets', 'StreetController');
Route::controller('admin/markers', 'MarkerController');
Route::controller('admin/questions', 'QuestionController');