<?php

class AuthController extends BaseController {

  public function login() {    
    $rules = array(
        'email' => 'required|email',
        'password' => 'required'
    );

    $messages = array(
        'email.email' => 'Nhập email chưa đúng',
        'email.required' => 'Nhập email',
        'password.required' => 'Nhập mật khẩu'
    );

    $input = Input::get();
    $validation = Validator::make($input, $rules, $messages);
    if ($validation->fails()) {
      return Redirect::to('register')
                      ->withErrors($validation)
                      ->withInput();
    }

    try {
      $user = Sentry::authenticate(array('email' => Input::get('email'), 'password' => Input::get('password')), false);
      $group = Sentry::findGroupByName('customer');
      if (Sentry::check() && $user->inGroup($group)) {
        if (Session::get('step') == 1) {
          return Redirect::to('/payment');
        } else {
          return Redirect::to('/');
        }
      } else {
        $message = 'Login failure.';
      }
    } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
      $message = 'Login field is required.';
    } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
      $message = 'Password field is required.';
    } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
      $message = 'Wrong password, try again.';
    } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
      $message = 'User was not found.';
    } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
      $message = 'User is not activated.';
    }

    // The following is only required if the throttling is enabled
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
      $message = 'User is suspended.';
    } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
      $message = 'User is banned.';
    }

    return Redirect::to('register')
                    ->with('message', $message);
  }

  public function register() {
    $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'mobile' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    );

    $messages = array(
        'name.required' => 'Nhập tên',
        'email.required' => 'Nhập email',
        'mobile.required' => 'Nhập số điện thoại',
        'password.required' => 'Nhập mật khẩu',
        'password_confirmation.required' => 'Nhập lại mật khẩu',
        'email.email' => 'Nhập email chưa đúng',
        'email.unique' => 'Email đã tồn tại',
        'password.confirmed' => 'Mật khẩu nhập lại chưa đúng',
    );

    $input = Input::get();
    $validation = Validator::make($input, $rules, $messages);
    if ($validation->fails()) {
      if (Session::get('step') == 3) {
        return Redirect::to('/payment/step2')
                        ->withErrors($validation)
                        ->withInput();
      }
      return Redirect::to('register')
                      ->withErrors($validation)
                      ->withInput();
    }

    $user = Sentry::createUser(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => true
    ));

    //Find Administrator group
    $group = Sentry::findGroupByName('customer');

    // Assign the group to the user
    $user->addGroup($group);

    Sentry::login($user, false);

    //$this->sendActivationEmail( $user->getActivationCode() );

    $data = array(
        'name' => Input::get('name'),
        'email' => Input::get('email'),
        'phone' => Input::get('phone'),
        'mobile' => Input::get('mobile'),
        'bday' => Input::get('bday'),
        'sex' => Input::get('gender'),
        'province_id' => Input::get('province'),
        'district_id' => Input::get('district'),
        'address' => Input::get('address'),
        'user_id' => $user->id,
        'note' => Input::get('note'),
    );

    if (Session::get('step') == 3) {
      $data = array(
          'name' => Input::get('name'),
          'email' => Input::get('email'),
          'mobile' => Input::get('mobile'),
          'user_id' => $user->id
      );
    }

    DB::table('customers')->insert($data);

    if (Session::get('step') == 3) {
      return Redirect::to('/payment/step2');
    } elseif (Session::get('step') == 1) {
      return Redirect::to('/payment');
    } else {
      return Redirect::to('register')
                      ->with('message', 'Success');
    }
  }

  private function sendActivationEmail($code) {    
    $activeUrl = action('AuthController@active', array('c' => $code));
    Mail::send('default.emails.activation', array('activeUrl' => $activeUrl), function($message) {
      $message->to(Input::get('email'), Input::get('name'))->subject('Active Account');
    });
  }

  public function active() {
    $code = strip_tags(Input::get('c'));
    if (!empty($code)) {
      try {
        $user = Sentry::findUserByActivationCode($code);
        if (!$user->isActivated()) {
          $user->attemptActivation($code);
//          echo 'actived';
        } else {
//          echo 'User has already actived';
        }
      } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
//        echo 'User was not found.';
      }
    } else {
//      echo 'Code is empty';
    }
    return View::make('default.page.active') ->with(array('title'=> 'Đăng ký'))
        ->with(array('body_class'=> 'page_contact'));    
  }

  public function logout() {
    if (Sentry::check()) {
      Sentry::logout();
    }
    return Redirect::to('/');
  }

  public function loginAjax() {

    $input = Input::get();
    try {
      $user = Sentry::authenticate(array('email' => Input::get('email'), 'password' => Input::get('password')), false);
      $group = Sentry::findGroupByName('customer');
      if (Sentry::check() && $user->inGroup($group)) {        
        $users = Sentry::getUser();
        return Response::json($user);        
      } else {
        $message = 'only customer can login';
      }
    } catch (Cartalyst\Sentry\Users\LoginRequiredException $e) {
      $message = 'Vui long nhập email và mật khẩu';
    } catch (Cartalyst\Sentry\Users\PasswordRequiredException $e) {
      $message = 'Vui lòng nhập mật khẩu';
    } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
      $message = 'Mật khẩu không đúng';
    } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
      $message = 'Email không đúng';
    } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
      $message = 'Tài khoản chưa được kích hoạt';
    }

    // The following is only required if the throttling is enabled
    catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e) {
      $message = 'Tài khoản ddang bị khóa';
    } catch (Cartalyst\Sentry\Throttling\UserBannedException $e) {
      $message = 'Tài khoản ddang bị khóa';
    }

    echo $message;
    exit();
  }

  public function registerAjax() {
    $rules = array(
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'mobile' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required',
        'danKy_DongY' => 'required'
    );

    $messages = array(
        'name.required' => 'Nhập tên',
        'email.required' => 'Nhập email',
        'mobile.required' => 'Nhập số điện thoại',
        'password.required' => 'Nhập mật khẩu',
        'password_confirmation.required' => 'Nhập lại mật khẩu',
        'email.email' => 'Nhập email chưa đúng',
        'email.unique' => 'Email đã tồn tại',
        'password.confirmed' => 'Mật khẩu nhập lại chưa đúng',
        'danKy_DongY.required' => 'Xin vui lòng đồng ý quy định của ĐỊNH GIÁ TRỰC TUYẾN'
    );

    $input = Input::get();
    $validation = Validator::make($input, $rules, $messages);
    if ($validation->fails()) {
      return Response::json($validation->messages());      
    }

    $user = Sentry::createUser(array(
                'email' => Input::get('email'),
                'password' => Input::get('password'),
                'activated' => false
    ));

    //Find Administrator group
    $group = Sentry::findGroupByName('customer');

    // Assign the group to the user
    $user->addGroup($group);

//    Sentry::login($user, false);
//    $activatedCode = $user->getActivationCode();
//    $user->attemptActivation($code);
    try {
      $this->sendActivationEmail( $user->getActivationCode() );
    }catch(Exception $e) {
      return Response::json('Email is sent error');
    }
    
    $bday = null;//d_ngaySinh
    if(Input::get('d_ngaySinh') || Input::get('m_ngaySinh') || Input::get('y_ngaySinh')){
      $bday  = Input::get('y_ngaySinh').'-'.Input::get('m_ngaySinh').'-'.Input::get('d_ngaySinh');
    }

    $data = array(
        'name' => Input::get('name'),
        'email' => Input::get('email'),
        'phone' => Input::get('phone'),
        'mobile' => Input::get('mobile'),
        'bday' => $bday,
        'sex' => Input::get('gender'),
        'province_id' => Input::get('province'),
        'district_id' => Input::get('district'),
        'address' => Input::get('address'),
        'user_id' => $user->id,
        'note' => Input::get('note'),
    );
    DB::table('customers')->insert($data);
    
    return Response::json($user);
  }

}
