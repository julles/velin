<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;
use Table;
use App\Models\Action;


class ActionController extends VelinController
{
	public function __construct(Action $model)
	{
		parent::__construct();

		$this->model = $model;
	}

	public function getData()
	{
		$model = $this->model->select('id','title','slug');

		$data =  Table::of($model)
		->addColumn('action' , function($model){
            return \Velin::buttons($model->id);
		})
		->make(true);
		
		return $data;
	}

	public function getIndex()
    {
    	return view('velin.development.action.index');
    }

    public function getCreate()
    {
    	return view('velin.development.action._form' , [
    		'model'	=> $this->model,
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
    	return view('velin.development.action._form' , [
    		'model'	=> $this->model->findOrFail($id),
    	]);
    }

    public function postUpdate(Request $request,$id)
    {
    	$model = $this->model->findOrFail($id);

    	$this->validate($request,$model->rules());

    	$model->update($request->all());

    	return redirectBackendAction('index')->withSuccess('Data has been updated');
    }

    public function getDelete($id)
    {
    	$model = $this->model->destroy($id);
    	return redirectBackendAction('index')->withSuccess('Data has been deleted');
    }
}
