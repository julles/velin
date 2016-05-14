<?php namespace Velin\Facades;

use Illuminate\Support\Facades\Facade;

class Site extends Facade
{
	public static function getFacadeAccessor()
	{
		return 'register-site';
	}
}