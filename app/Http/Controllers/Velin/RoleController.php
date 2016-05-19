<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;
use Table;

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
    }

    public function getIndex()
    {
    	return view('velin.manage_user.role.index');
    }
}
