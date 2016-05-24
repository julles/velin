<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;
use Table;
use Velin;
use App\Models\Role;

class RoleController extends VelinController
{
	public $model;

    public function __construct(Role $model)
    {
    	parent::__construct();
    	$this->model = $model;
    }

    public function getData()
    {
    	$model = $this->model->select('id','role');

    	$data = Table::of($model)
    		->addColumn('action' , function($model){
    			return Velin::buttons($model->id);
    		})
    		->make(true);

        return $data;
    }

    public function getIndex()
    {
    	return view('velin.manage_user.role.index');
    }

    public function getCreate()
    {
        return view('velin.manage_user.role._form',[
            'model' => $this->model,
        ]);
    }

    public function postCreate(Request $request)
    {
        $model = $this->model;

        $this->validate($request,$model->rules());
    
        $model->create($request->all());

        return redirectBackendAction('index')->withSuccess('Data has been saved');
    }

    public function getUpdate($id)
    {
        $model = $this->model->findOrFail($id);

        return view('velin.manage_user.role._form',[
            'model' => $model,
        ]);
    }

    public function postUpdate(Request $request,$id)
    {
        $model = $this->model->findOrFail($id);

        $this->validate($request,$model->rules($id));

        $model->updated($request->all());

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
