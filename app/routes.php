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
Route::get('/search', 'HomeController@search');
Route::get('/markers', 'HomeController@getMarkers');
Route::get('/info', 'HomeController@getInfo');
Route::get('/thong-tin-tai-khoan.html', 'CustomerController@getInfo');
Route::get('/lien-he.html', 'ContactController@getIndex');
Route::get('/address', 'HomeController@getAddress');
Route::get('/streets', 'HomeController@getStreet');
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


Route::get('/price', function() {
     $marker = Marker::findByPlaceId(Input::get('placeId'));
     $street = Street::find(Input::get('street'));
     $disTrict = District::find($street->district_id);
     $address = ($marker) ? $marker->name : Input::get('address');
     
     $viTri = AdjustOption::findByGroupId(15, 1, null)->get()->toArray();
     $hinhDangThuaDat = AdjustOption::findByGroupId(4, 1, null)->get()->toArray();
     $yeuToKhac = AdjustOption::findByGroupId(16, 1, null)->get()->toArray();
     $chieuNgang = AdjustOption::findByGroupId(1, 1, null)->get()->toArray();
     $dienTichDat = AdjustOption::findByGroupId(3, 1, null)->get()->toArray();
     $ketCauChinh = User::getKetCauChinh();
     return View::make('default.page.price')
        ->with('address', $address)
        ->with('placeId', Input::get('placeId'))
	    ->with('streetId', Input::get('street'))
        ->with(array('title'=> 'Định giá'))
        ->with(array('body_class'=> 'page_search'))     
        ->with(array('viTri'=> $viTri))
        ->with(array('hinhDangThuaDat'=> $hinhDangThuaDat))
        ->with(array('yeuToKhac'=> $yeuToKhac))
        ->with(array('chieuNgang'=> $chieuNgang))
        ->with(array('dienTichDat'=> $dienTichDat))
        ->with(array('disTrict' => $disTrict))
        ->with(array('ketCauChinh' => $ketCauChinh));
});

Route::post('/district', function() {
    $districts = Province::find(Input::get('id'))->districts;
    return Response::json($districts);
});

Route::get('/plan', function() {
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
Route::get('/result', 'HomeController@showResult');
Route::get('/register', function() {
     return View::make('default.page.register')
        ->with(array('title'=> 'Đăng ký'))
        ->with(array('body_class'=> 'page_contact'));
});
Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::post('/login-ajax', 'AuthController@loginAjax');

Route::get('/logout', 'AuthController@logout');

Route::get('/structure', 'HomeController@getStructure');

Route::post('/the-price', 'HomeController@getPrice');


Route::group(array('before' => 'dg_admin_authentication'), function() {
     Route::controller('admin/info', 'InfoController');
     Route::controller('admin/streets', 'StreetController');
     Route::controller('admin/markers', 'MarkerController');
     Route::controller('admin/questions', 'QuestionController');
     Route::controller('admin/plans', 'PlanController');
     Route::controller('admin/contacts', 'AdminContactController');
     Route::controller('admin/users', 'UserController');
     Route::controller('admin/customers', 'CustomerController');
     Route::get('admin/dashboard', 'AdminController@dashboard');
});

Route::controller('admin', 'AdminController');

Route::controller('/contact', 'ContactController');