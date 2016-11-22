<?php
class QuestionController extends AdminController {
    
    public function __construct()
    {
        parent::__construct();
        $this->active('hoi-dap');
    }

    public function getIndex()
    {
        $questions = DB::table('questions')->orderBy('created_at', 'desc')
	    ->paginate(Config::get('constant.admin.pager'));
	    $pager = $questions->links();
	    
        return View::make('admin.question.view')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title' => 'Hỏi đáp', 'questions' => $questions, 'pager' => $pager));
    }
    
    public function getAdd()
    {
        return View::make('admin.question.add')
            ->with(array('menu' => $this->menuInstance() ))
            ->with(array('title'=> 'Thêm câu hỏi'));
    }

    public function getEdit($id = 0)
    {
        $question = Question::find($id);
        return View::make('admin.question.edit')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('question', $question)
            ->with(array('title'=> 'Cập nhật câu hỏi'));
    }

    public function getShow($id = 0)
    {
        $question = Question::find($id);
        return View::make('admin.question.show')
            ->with(array('menu' => $this->menuInstance() ))
            ->with('question', $question)
            ->with(array('title'=> 'Chi tiết câu hỏi'));
    }
    
    
    public function postAdd()
    {
        $rules = array(
            'question' => 'required',
            'answers' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/questions/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $data = array(
                'question' => Input::get('question'),
                'answers' => Input::get('answers')
            );
            
        DB::table('questions')->insert($data);
        
        return Redirect::to('admin/questions')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
                
    }
    
    public function postEdit() 
    {
        $rules = array(
            'question' => 'required',
            'answers' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/questions/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $question = Question::find(Input::get('id'));
        $question->question = Input::get('question'); 
        $question->answers = Input::get('answers'); 
        
        $question->save();
        
        return Redirect::to('admin/questions')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $question = Question::find($id);
        $question->delete();
        return Redirect::to('admin/questions')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}