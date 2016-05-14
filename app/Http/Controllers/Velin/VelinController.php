<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
class VelinController extends Controller
{
    public function __construct()
    {
    	view()->share('parentMenus' , $this->parentMenus());
    }

    public function parentMenus()
    {
    	$model = new Menu;

    	return $model->whereParentId(null)->orderBy('order','asc')->get();
    }
}
