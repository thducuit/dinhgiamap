<?php
class UserController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('thanh-vien');
    }

    public function getIndex()
    {
        $users = DB::table('users')->orderBy('created_at', 'desc')
	    ->paginate(Config::get('constant.admin.pager'));
	    $pager = $users->links();
	    
        return View::make('admin.user.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Thành viên', 'users' => $users, 'pager' => $pager));
    }
    
    public function getAdd()
    {
        return View::make('admin.user.add')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm thành viên'));
    }

    public function getEdit($id = 0)
    {
        $user = Sentry::findUserById($id);
        $group_name = ( count( $user->getGroups()) ) ? $user->getGroups()[0]->name : '';
        return View::make('admin.user.edit')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('user', $user)
            ->with('group_name', $group_name)
            ->with(array('title'=> 'Cập nhật thành viên'));
    }

    public function getShow($id = 0)
    {
        $user = Sentry::findUserById($id);
        return View::make('admin.user.show')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('user', $user)
            ->with(array('title'=> 'Chi tiết thành viên'));
    }

    public function getActive($id = 0)
    {
        $user = Sentry::findUserById($id);
        $user->activated = 1;
        $user->save();
        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getDeactive($id = 0)
    {
        $user = Sentry::findUserById($id);
        $user->activated = 0;
        $user->save();
        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }

    public function getPassword($id = 0)
    {
        $user = Sentry::findUserById($id);
        return View::make('admin.user.password')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('user', $user)
            ->with(array('title'=> 'Đổi mật khẩu'));
    }
    
    
    public function postAdd()
    {
        $rules = array(
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );
        
        $messages = array(
            'email.required' => 'Nhập email',
            'password.required' => 'Nhập mật khẩu',
            'password_confirmation.required' => 'Nhập lại mật khẩu',
            'email.email' => 'Nhập email chưa đúng',
            'email.unique' => 'Email đã tồn tại',
            'password.confirmed' => 'Mật khẩu nhập lại chưa đúng',
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/users/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $user = Sentry::createUser(array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
            'last_name' => Input::get('last_name'),
            'first_name' => Input::get('first_name'),
            'activated' => false
        ));
        $group = Sentry::findGroupByName(Input::get('group_name'));
        
        // Assign the group to the user
        $user->addGroup($group);
        
        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
                
    }

    public function postPassword()
    {
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );
        
        $messages = array(
            'old_password.required' => 'Nhập mật khẩu cũ',
            'password.required' => 'Nhập mật khẩu',
            'password_confirmation.required' => 'Nhập lại mật khẩu',
            'password.confirmed' => 'Mật khẩu nhập lại chưa đúng',
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/users/password/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }

        $user = Sentry::findUserById(Input::get('id'));

        if(!$user->checkPassword(Input::get('old_password')))
        {
            return Redirect::to('admin/users/password/' . Input::get('id'))
            ->with('message', 'Error')
            ->with('icon', Config::get('constant.admin.alert.error.icon'))
            ->with('type_message', Config::get('constant.admin.alert.error.type'));
        }

        // Get the password reset code
        $resetCode = $user->getResetPasswordCode();

        $user->attemptResetPassword($resetCode, Input::get('password'));

        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function postEdit() 
    {
        $rules = array(
            'email' => 'required|email|unique:users,email,' . Input::get('id'),
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/users/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $user = Sentry::findUserById(Input::get('id'));
        $user->email = Input::get('email'); 
        $user->last_name = Input::get('last_name'); 
        $user->first_name = Input::get('first_name'); 

        $group = $user->getGroups()[0];
        if($group->name != Input::get('group_name'))
        {
            $user->removeGroup($group);
            $group = Sentry::findGroupByName(Input::get('group_name'));
        
            // Assign the group to the user
            $user->addGroup($group);
        }
        

        
        $user->save();
        
        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $user = User::find($id);
        $user->delete();
        return Redirect::to('admin/users')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}