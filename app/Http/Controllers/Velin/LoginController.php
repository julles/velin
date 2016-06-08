<?php

namespace App\Http\Controllers\Velin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getIndex()
    {
    	return view('velin.login');
    }

    public function postIndex(Requests\Velin\LoginRequest $request)
    {
    	if(Auth::attempt(['username' => $request->username,'password' => $request->password]))
    	{
    		return redirect('admin');
    	}else{
    		return redirect()->back()->withInput()->with('info','Account Not Found!');
    	}
    	
    }

    public function getLogout()
    {
    	Auth::logout();

    	return redirect('login-page');
    }
}
