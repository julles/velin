<?php
Route::group(['prefix' => \Velin::config('backendUrl')] , function(){
	
	Route::get('/','Velin\DefaultController@index');

	$path = app_path('Http/Controllers/Velin/');

	foreach(\Velin::injectModel('Menu')->where('controller','!=','#')->get() as $route)
	{
		if(file_exists($path.$route->controller.'.php'))
		{
			Route::controller($route->slug,'Velin\\'.$route->controller);
		}
	}

});