<?php

Route::group(['middleware'=>['auth','right'],'prefix' => \Velin::config('backendUrl')] , function(){
	
	Route::controller('default','Velin\DefaultController');

	$path = app_path('Http/Controllers/Velin/');

	foreach(\Velin::injectModel('Menu')->where('controller','!=','#')->get() as $route)
	{
		if(file_exists($path.$route->controller.'.php'))
		{
			Route::controller($route->slug,'Velin\\'.$route->controller);
		}
	}

});