<?php

class AdminController extends BaseController {

	private $menu;

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
	public function __construct()
    {
        $this->menu = array(
				array('alias'=>'khu-vuc' ,'title'=>'Đoạn đường / Khu vực', 'url'=>'admin/streets', 'icon'=>'road', 'active'=>false, 'show'=>true),
				array('alias'=>'ban-do-quy-hoach' ,'title'=>'Bản đồ', 'url'=>'admin/plans', 'icon'=>'tower', 'active'=>false, 'show'=>true),
				array('alias'=>'dia-chi' ,'title'=>'Địa chỉ / Vị trí', 'url'=>'admin/markers', 'icon'=>'home', 'active'=>false, 'show'=>true),
				array('alias'=>'hoi-dap' ,'title'=>'Hỏi đáp', 'url'=>'admin/questions', 'icon'=>'question-sign', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'lien-he' ,'title'=>'Liên hệ', 'url'=>'admin/contacts', 'icon'=>'envelope', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'tai-san' ,'title'=>'Tài sản', 'url'=>'admin/estates', 'icon'=>'shopping-cart', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'quy-hoach' ,'title'=>'Quy hoạch', 'url'=>'admin/maps', 'icon'=>'tower', 'active'=>false, 'show'=>true),
				array('alias'=>'thanh-vien' ,'title'=>'Thành viên', 'url'=>'admin/users', 'icon'=>'user', 'active'=>false, 'show'=>$this->isAdmin())
			);
    }

	protected function menuInstance()
	{
		return $this->menu;
	}

	protected function active($alias = null)
	{
		for($i = count($this->menu) - 1; $i>=0; $i--)
		{
			$m = $this->menu[$i];
			if($m['alias'] == $alias) 
			{
				$this->menu[$i]['active'] = true;
			}
			else
			{
				$this->menu[$i]['active'] = false;
			}
		}
	}

	protected function getUser()
	{
		$user = Sentry::getUser();
		return $user->id;
	}

	protected function isAdmin()
	{
		$user = Sentry::getUser();
		$admin = Sentry::findGroupByName('administrator');
		if($user)
		{
			return $user->inGroup($admin);
		}
		return false;
	}

	protected function isDataManager()
	{
		$user = Sentry::getUser();
		$admin = Sentry::findGroupByName('datamanager');
		if($user)
		{
			return $user->inGroup($admin);
		}
		return false;
	}

	public function dashboard()
	{
		return View::make('admin.dashboard')
			->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'trang chủ'));
	}

	public function getLogin()
	{
		return View::make('admin/layouts/login');
	}
	
	public function postLogin() 
	{
		$inputs = Input::get();
		$rules = array(
			'email' => 'required|email',
			'password' => 'required'
			);
		$validation = Validator::make($inputs, $rules);
		if( $validation->fails() )
		{
			return Redirect::to('admin/login')
			->withErrors($validation)
			->withInput();
		}
		
		try
		{
		    $remember = Input::get('remember');
			$user = Sentry::authenticate(array('email'=>Input::get('email'), 'password'=>Input::get('password')), false);
			if( Sentry::check() )
			{
				$admin = Sentry::findGroupByName('administrator');
				$writer = Sentry::findGroupByName('writer');
				$datamanager = Sentry::findGroupByName('datamanager');
				if( !( $user->inGroup($admin)  || $user->inGroup($writer) || $user->inGroup($datamanager) ) )
				{
					return Redirect::to('admin/login')
						->with('message', 'Không thể truy cập hệ thống. Vui lòng thử lại')
	                    ->with('icon', Config::get('constant.admin.alert.error.icon'))
	                    ->with('type_message', Config::get('constant.admin.alert.error.type'));
				}
				else
				{
				    if($remember)
				    {
				        Sentry::loginAndRemember($user);
				    }
					return Redirect::to('admin/dashboard');
				}
			}
		}
		catch(Cartalyst\Sentry\Users\WrongPasswordException $e)
		{
			return Redirect::to('admin/login')
					->with('message', 'Tài khoản hoặc mật khẩu có sai')
                    ->with('icon', Config::get('constant.admin.alert.error.icon'))
                    ->with('type_message', Config::get('constant.admin.alert.error.type'));
		}
		catch(Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::to('admin/login')
					->with('message', 'Tài khoản không tồn tại')
                    ->with('icon', Config::get('constant.admin.alert.error.icon'))
                    ->with('type_message', Config::get('constant.admin.alert.error.type'));
		}catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
	      return Redirect::to('admin/login')
					->with('message', 'Tài khoản chưa kích hoạt')
                    ->with('icon', Config::get('constant.admin.alert.error.icon'))
                    ->with('type_message', Config::get('constant.admin.alert.error.type'));
	    }
		
	}
	
	public function getLogout()
	{
	    if( Sentry::check() )
        {
        	Sentry::logout();
        }
    	return Redirect::to('admin/login');
	}

}
