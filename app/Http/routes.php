<?php
Route::get('/', function () {
	return view('welcome');
});

Route::controller('login-page','Velin\LoginController');


if(request()->segment(1) == \Velin::config('backendUrl'))
{
	include __dir__.'/velin_routes.php';	
}