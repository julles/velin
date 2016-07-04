<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;
use Table;

use App\Models\Role;
use App\Models\Menu;

class RoleController extends VelinController
{
	public function __construct(Role $model,Menu $menu)
    {
    	parent::__construct();
    	$this->model = $model;
        $this->menu = $menu;
    }

    public function getData()
    {
    	$model = $this->model->select('id','role');

    	$data = Table::of($model)
    		->addColumn('action' , function($model){
    			return \Velin::buttons($model->id);
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

    public function postCreate(Requests\Velin\RoleRequest $request)
    {
        return velin()->simpleCreate($this->model,$request);
    }

    public function getUpdate($id)
    {
        $model = $this->model->findOrFail($id);

        return view('velin.manage_user.role._form',[
            'model' => $model,
        ]);
    }

    public function postUpdate(Requests\Velin\RoleRequest $request,$id)
    {
        return velin()->simpleUpdate($this->model->findOrFail($id),$request);
    }

    public function getDelete($id)
    {
        return velin()->simpleDelete($this->model->findOrFail($id));
    }

    public function getView($id)
    {
        $model = $this->model->findOrFail($id);
        $menus = $this->menu
            ->whereParentId(null)
            ->get();

        $cek = function($menuActionId) use ($model){
            return $this->cek($model->id,$menuActionId);
        };


        return view('velin.manage_user.role.view' ,[
            'model' => $model,
            'menus' => $menus,
            'cek'   => $cek,
        ]);
    }

    public function postView(Request $request,$id)
    {
        $model = $this->model->findOrFail($id);

        $right = injectModel('Right');

        $count = count($request->menu_action_id);

        $right->whereRoleId($model->id)->delete();

        $records = [];

        for($a=0;$a<$count;$a++)
        {
            $records[] = [
                'role_id'   => $model->id,
                'menu_action_id'   => $request->menu_action_id[$a],
            ];
        }

        $insert = $right->insert($records);

            return redirectBackendAction('index')
                ->withSuccess('Data has been updated');
        
    }

    public function cek($roleId,$menuActionId)
    {
        $cek = \Velin::cekRightRoleMenuAction($roleId,$menuActionId);

        if($cek == 'true')
        {
            return 'checked="checked"';
        }
    }
}
