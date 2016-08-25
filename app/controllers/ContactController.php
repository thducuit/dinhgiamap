<?php
class ContactController extends BaseController {
    
    public function getIndex()
    {
        return View::make('default.page.contact')
        ->with(array('title'=> 'liên hệ'))
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
        
        $validation = Validator::make(Input::get(), $rules);
        
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
                ->with('message', 'Success');
    }
    
    public function sendMailReply()
    {
        try{
            Mail::send('emails.contact.reply', array(), function($message)
            {
              $message->to(Input::get('email'))->subject('Welcome to the CenValue!');
            });
        }catch(Exception $e)
        {
            return Redirect::to('/contact')
                ->with('message', 'Fail');
        }
        
    }
}