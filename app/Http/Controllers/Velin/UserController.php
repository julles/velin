<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;
use App\Models\User;
use App\Models\Role;
use Table;


class UserController extends VelinController
{
    public function __construct(User $model,Role $role)
    {
    	parent::__construct();
    	$this->model = $model;
    	$this->role = $role;
    }

    public function roles()
    {
    	$roles = $this->role->lists('role','id')->toArray();

    	return ['' => 'Select Role'] + $roles;
    }

    public function getData()
    {
    	$model = $this->model->select('users.id','username','name','role')

    		->join('roles','roles.id','=','users.role_id');

    	$data = Table::of($model)
    		->addColumn('action' , function($model){
    			return \Velin::buttons($model->id);
    		})
    		->make(true);

        return $data;
    }

    public function getIndex()
    {
    	return view('velin.manage_user.user.index');
    }

    public function getCreate()
    {	
    	return view('velin.manage_user.user._form',[
    		'model'		=> $this->model,
    		'roles'		=> $this->roles(),
    	]);
    }

    public function postCreate(Request $request)
    {
    	$model = $this->model;

    	$this->validate($request,$model->rules());
    	
    	$inputs = $request->all();

    	$inputs['password'] = \Hash::make($request->password);

    	$model->create($inputs);

    	return redirectBackendAction('index')->withSuccess('Data has been saved');
    
    }

    public function getUpdate($id)
    {
    	$model = $this->model->findOrFail($id);
    	return view('velin.manage_user.user._form',[
    		'model'		=> $model,
    		'roles'		=> $this->roles(),
    	]);
    }

    public function postUpdate(Request $request,$id)
    {
    	$model = $this->model->findOrFail($id);

    	$this->validate($request,$model->rules($id));
    	
    	$inputs = $request->all();

    	$inputs['password'] = \Hash::make($request->password);

    	$model->update($inputs);

    	return redirectBackendAction('index')->withSuccess('Data has been updated');
    }

    public function getDelete($id)
    {
        $model  = $this->model->findOrFail($id);
        try
        {
            $model->delete();
            return redirectBackendAction('index')->withSuccess('Data has been deleted');
        }catch(\Exception $e){
            return redirectBackendAction('index')->flashInfo('Data cannot be deleted');
        }
    }
}
