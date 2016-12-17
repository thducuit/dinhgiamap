<?php
class ContactController extends BaseController {
    
    public function getIndex()
    {
        return View::make('default.page.contact')
        ->with(array('title'=> 'Liên hệ'))
        ->with('current', 6)
        ->with(array('body_class'=> 'page_contact'));
    }
    
    public function postAdd()
    {
        $rules = array(
            'name' => 'required',    
            'email' => 'required|email',    
            'title' => 'required',    
            'content' => 'required',    
        );

        $messages = array(
            'name.required' => 'Nhập họ và tên',
            'email.required'=>'Nhập email',
            'email.email'=>'Nhập chưa đúng',
            'title.required'=>'Nhập tiêu đề',
            'content.required'=>'Nhập nội dung'
        );
        
        $validation = Validator::make(Input::get(), $rules, $messages);
        
        if( $validation->fails() )
        {
            return Redirect::to('/contact')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $data = array(
                'name' => Input::get('name'),
                'phone' => Input::get('phone'),
                'email' => Input::get('email'),
                'title' => Input::get('title'),
                'content' => Input::get('content')
            );
            
            
        Contact::create($data);
        
        $this->sendMailReply();
        
        return Redirect::to('/contact')
                ->with('class_alert', 'alert-c-success')
                ->with('message', 'Success');
    }
    
    public function sendMailReply()
    {
        try{
            Mail::send('emails.contact.reply', array(), function($message)
            {
              $message->to(Input::get('email'))->subject('Welcome to the CenValue!');
            });

            if(count(Mail::failures()) > 0){
                return Redirect::to('/contact')
                    ->with('class_alert', 'alert-error')
                    ->with('message', 'Failed to send password reset email, please try again.');
            }
        }catch(Exception $e)
        {
            return Redirect::to('/contact')
                ->with('class_alert', 'alert-error')
                ->with('message', 'Fail');
        }
        
    }
}