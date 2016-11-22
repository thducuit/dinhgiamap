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
				array('alias'=>'quy-hoach' ,'title'=>'Bản đồ Quy hoạch', 'url'=>'admin/plans', 'icon'=>'tower', 'active'=>false, 'show'=>true),
				array('alias'=>'dia-chi' ,'title'=>'Địa chỉ / Vị trí', 'url'=>'admin/markers', 'icon'=>'home', 'active'=>false, 'show'=>true),
				array('alias'=>'hoi-dap' ,'title'=>'Hỏi đáp', 'url'=>'admin/questions', 'icon'=>'question-sign', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'lien-he' ,'title'=>'Liên hệ', 'url'=>'admin/contacts', 'icon'=>'envelope', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'khach-hang' ,'title'=>'Khách hàng', 'url'=>'admin/customers', 'icon'=>'shopping-cart', 'active'=>false, 'show'=>$this->isAdmin()),
				array('alias'=>'thanh-vien' ,'title'=>'Thành viên', 'url'=>'admin/users', 'icon'=>'user', 'active'=>false, 'show'=>$this->isAdmin())
			);
    }

	protected function menuInstance()
	{
		return $this->menu;
	}

	protected function active($alias=null)
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
				if( !$user->inGroup($admin) && !$user->inGroup($writer) )
				{
					return Redirect::to('admin/login')
						->with('message', 'Can not access to dashboard.Try again')
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
					->with('message', 'Email or password is not match')
                    ->with('icon', Config::get('constant.admin.alert.error.icon'))
                    ->with('type_message', Config::get('constant.admin.alert.error.type'));
		}
		catch(Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			return Redirect::to('admin/login')
					->with('message', 'Email not found')
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
