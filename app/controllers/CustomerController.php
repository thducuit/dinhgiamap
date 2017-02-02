<?php
class CustomerController extends BaseController {
    
    public function getInfo()
    {
        $user = Sentry::getUser();
        $customer = User::find($user->id)->customer;
        if( empty($customer) ) 
        {
            return Redirect::to('/');
        }
        return View::make('default.customers.info')
            ->with(array('customer' =>  $customer))
            ->with(array('title'=> 'Thông tin tài khoản'))
            ->with(array('body_class'=> 'page_xemquihoach ready'));
    }

    public function getUpdate()
    {
        $user = Sentry::getUser();
        $customer = User::find($user->id)->customer;

         return View::make('default.customers.update')
            ->with(array('customer' =>  $customer))
            ->with(array('title'=> 'Cập nhật tài khoản'))
            ->with(array('body_class'=> 'page_xemquihoach'));
    }

    public function postUpdate()
    {
        $rules = array(
            'name' => 'required',
            'mobile' => 'required'
        );
        
        $messages = array(
            'name.required' => 'Nhập tên',
            'mobile.required' => 'Nhập số điện thoại',
        );

        $input = Input::get();
        $validation = Validator::make($input, $rules, $messages);
        if( $validation->fails() )
        {
            return Redirect::to('/customer/update')
                    ->withErrors($validation)
                    ->withInput();
        }
        $bday = null;
        if(Input::get('d_ngaySinh') || Input::get('m_ngaySinh') || Input::get('y_ngaySinh')){
          $bday  = Input::get('y_ngaySinh').'-'.Input::get('m_ngaySinh').'-'.Input::get('d_ngaySinh');
        }
        $user = Sentry::getUser();
        $customer = User::find($user->id)->customer;

        $customer->name = Input::get('name');
        $customer->phone = Input::get('phone');
        $customer->mobile = Input::get('mobile');
        $customer->bday = $bday;
        $customer->sex = Input::get('gender');
        $customer->province_id = Input::get('province');
        $customer->district_id = Input::get('district');
        $customer->address = Input::get('address');
        $customer->note = Input::get('note');

        $customer->save();

        return Redirect::to('/customer/info')
                ->with( array('message' => 'Update success' ) );
    }
}
