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
            'content' => 'required'
        );

        $messages = array(
            'name.required' => 'Nhập họ và tên',
            'email.required'=>'Nhập email',
            'email.email'=>'Nhập chưa đúng',            
            'content.required'=>'Nhập nội dung'
        );
        
        $validation = Validator::make(Input::get(), $rules, $messages);
                 
        if( $validation->fails() )
        {              
            return Redirect::to('/contact')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
         
        
        if(isset($_FILES['file']) && $_FILES['file']['name']){
          $statusUpload = $this->uploadFile($_FILES['file'], 'contact');
          if ($statusUpload['isSuccess']) {
            $file = $statusUpload['data'];
          }else{
            $validation->errors()->add('file', $statusUpload['data']);        
            return Redirect::to('/contact')
            ->withInput(Input::all())
            ->withErrors($validation);
          }
        }
        $data = array(
                'name' => Input::get('name'),
                'phone' => Input::get('phone'),
                'email' => Input::get('email'),                
                'content' => Input::get('content'),
                'file' => $file,
                'position' => Input::get('position'),
                'purpose' => Input::get('purpose')
            );
            
            
        Contact::create($data);
        
        $this->sendMailReply();
        
        return Redirect::to('/contact')
                ->with('class_alert', 'alert-success')
                ->with('message', 'Đã gửi thành công thông tin của bạn');
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
    
    public function cleanFileName($string) {
      $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

      return preg_replace('/[^A-Za-z0-9.\-]/', '', $string); // Removes special chars.
    }
    public function uploadFile($uploadFile, $folderName) {    
      $fileInfo = pathinfo($uploadFile['name']);
      $validExt = ['rar', 'zip'];
      if (array_search($fileInfo['extension'], $validExt) !== false) {
        if ($uploadFile['size'] <= 2000000) {
          $fileName = $this->cleanFileName($fileInfo['filename']).date('d-m-Y').'.'.$fileInfo['extension'];
          if (move_uploaded_file($uploadFile['tmp_name'], dirname($_SERVER['SCRIPT_FILENAME']) . '/upload/'  . $folderName . '/' . $fileName)) {
            return array(
                'isSuccess' => true,
                'data' => $fileName
            );
          }
        } else {
          return array(
              'isSuccess' => false,
              'data' => 'Vui lòng tải lên tập tin < 2MB'
          );
        }
      } else {
        return array(
            'isSuccess' => false,
            'data' => 'Vui lòng tải lên tập tin rar hoặc zip'
        );
      }
    }
}