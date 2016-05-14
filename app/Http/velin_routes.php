<?php
Route::group(['prefix' => \Velin::config('backendUrl')] , function(){
	
	Route::get('/','Velin\DefaultController@index');

});