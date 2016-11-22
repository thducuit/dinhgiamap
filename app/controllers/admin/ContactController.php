<?php
class AdminContactController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('lien-he');
    }

    public function getIndex()
    {
        $contacts = DB::table('contacts')->orderBy('created_at', 'desc')
	    ->paginate(Config::get('constant.admin.pager'));
	    $pager = $contacts->links();
	    
        return View::make('admin.contact.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Liên hệ', 'contacts' => $contacts, 'pager' => $pager));
    }
    
    // public function getAdd()
    // {
    //     return View::make('admin.contact.add')
    //         ->with(array('menu' => $this->menuInstance() ))
    //         ->with(array('title'=> 'Thêm câu hỏi'));
    // }

    // public function getEdit($id = 0)
    // {
    //     $contact = contact::find($id);
    //     return View::make('admin.contact.edit')
    //         ->with(array('menu' => $this->menuInstance() ))
    //         ->with('contact', $contact)
    //         ->with(array('title'=> 'Cập nhật liên hệ'));
    // }

    public function getShow($id = 0)
    {
        $contact = Contact::find($id);
        return View::make('admin.contact.show')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('contact', $contact)
            ->with(array('title'=> 'Chi tiết liên hệ'));
    }
    
    
    // public function postAdd()
    // {
    //     $rules = array(
    //         'contact' => 'required',
    //         'answers' => 'required'
    //     );
        
    //     $inputs = Input::get();
    //     $validation = Validator::make($inputs, $rules);
        
    //     if( $validation->fails() )
    //     {
    //         return Redirect::to('admin/contacts/add')
    //         ->withInput(Input::all())
    //         ->withErrors($validation);
    //     }
        
    //     $data = array(
    //             'contact' => Input::get('contact'),
    //             'answers' => Input::get('answers')
    //         );
            
    //     DB::table('contacts')->insert($data);
        
    //     return Redirect::to('admin/contacts')
    //             ->with('message', 'Success')
    //             ->with('icon', Config::get('constant.admin.alert.success.icon'))
    //             ->with('type_message', Config::get('constant.admin.alert.success.type'));
                
    // }
    
    // public function postEdit() 
    // {
    //     $rules = array(
    //         'contact' => 'required',
    //         'answers' => 'required'
    //     );
        
    //     $inputs = Input::get();
    //     $validation = Validator::make($inputs, $rules);
        
    //     if( $validation->fails() )
    //     {
    //         return Redirect::to('admin/contacts/edit/' . Input::get('id'))
    //         ->withInput(Input::all())
    //         ->withErrors($validation);
    //     }
        
    //     $contact = contact::find(Input::get('id'));
    //     $contact->contact = Input::get('contact'); 
    //     $contact->answers = Input::get('answers'); 
        
    //     $contact->save();
        
    //     return Redirect::to('admin/contacts')
    //             ->with('message', 'Success')
    //             ->with('icon', Config::get('constant.admin.alert.success.icon'))
    //             ->with('type_message', Config::get('constant.admin.alert.success.type'));
    // }
    
    public function getDelete($id = 0) 
    {
        $contact = Contact::find($id);
        $contact->delete();
        return Redirect::to('admin/contacts')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}