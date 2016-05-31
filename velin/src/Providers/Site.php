<?php namespace Velin\Providers;

use Illuminate\Support\ServiceProvider;

use Velin\Skeletons\Site as SiteSkeleton;

class Site extends ServiceProvider
{
	public function boot()
	{
		$velinConfigPath =  __DIR__."/../skeletons/velin_config.php";

		$this->publishes([
        	$velinConfigPath => config_path('velin_config.php'),
    	], 'config');
	}

	public function register()
	{

		$velinConfigPath =  __DIR__."/../skeletons/velin_config.php";
		
		$configPath = config_path('velin_config.php');

		if(file_exists($configPath))
		{	
			$this->mergeConfigFrom($configPath, 'velin');
		}else{
			$this->mergeConfigFrom($velinConfigPath, 'velin');
		}

	
		$this->app->bind('register-site' , function(){
			return new SiteSkeleton;
		});
	}
}