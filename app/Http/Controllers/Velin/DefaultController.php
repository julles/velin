<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Velin\VelinController;

class DefaultController extends VelinController
{
    public function getIndex()
    {
    	return view('velin.default.index');
    }
}
