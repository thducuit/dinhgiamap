<?php
class StreetController extends BaseController {
    
    public function getIndex() 
    {
        $streets = DB::table('streets')
	    ->paginate(Config::get('constant.admin.pager'));
	    $pager = $streets->links();
	    
        return View::make('admin.street.view')
        ->with(array('title'=>'Đoạn đường', 
                    'pager' => $pager, 
                    'streets' => $streets)
              );    
    }
    
    public function getAdd()
    {
        return View::make('admin.street.add')
        ->with(array('title'=>'Thêm mới'));
    }
    
    public function postAdd()
    {
        $rules = array(
            'name' => 'required',
            'start_lat' => 'required',
            'start_lng' => 'required',
            'end_lat' => 'required',
            'end_lng' => 'required',
            'price' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/streets/add')
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        $data = array(
                'name' => Input::get('name'),
                'place_id' => Input::get('place_id'),
                'start_lat' => Input::get('start_lat'),
                'start_lng' => Input::get('start_lng'),
                'end_lat' => Input::get('end_lat'),
                'end_lng' => Input::get('end_lng'),
                'price' => Input::get('price')
            );
            
        DB::table('streets')->insert($data);
        
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('dinhgia.admin.alert.success.icon'))
                ->with('type_message', Config::get('dinhgia.admin.alert.success.type'));
        
    }
    
    public function getEdit($id = 0)
    {
        $street = Street::find($id);
        return View::make('admin.street.edit')
        ->with('street', $street)
        ->with(array('title'=> 'Cập nhật đoạn đường'));
    }
    
    public function postEdit()
    {
        $rules = array(
            'name' => 'required',
            'start_lat' => 'required',
            'start_lng' => 'required',
            'end_lat' => 'required',
            'end_lng' => 'required',
            'price' => 'required'
        );
        
        $inputs = Input::get();
        $validation = Validator::make($inputs, $rules);
        
        if( $validation->fails() )
        {
            return Redirect::to('admin/streets/edit/' . Input::get('id'))
            ->withInput(Input::all())
            ->withErrors($validation);
        }
        
        
        $street = Street::find(Input::get('id'));
        $street->name = Input::get('name'); 
        $street->place_id = Input::get('place_id'); 
        $street->start_lat = Input::get('start_lat'); 
        $street->start_lng = Input::get('start_lng'); 
        $street->end_lat = Input::get('end_lat'); 
        $street->end_lng = Input::get('end_lng'); 
        $street->price = Input::get('price');
        
        
        $street->save();
        
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
    
    public function getDelete($id = 0) 
    {
        $street = Street::find($id);
        $street->delete();
        return Redirect::to('admin/streets')
                ->with('message', 'Success')
                ->with('icon', Config::get('constant.admin.alert.success.icon'))
                ->with('type_message', Config::get('constant.admin.alert.success.type'));
    }
}