<?php namespace Velin\Skeletons;
/**
 * Velin Admin Panel - Baceknd For Laravel 5
 *
 * @author   Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 * 
 */

use App\Models\Menu;

class Site
{
	/**
     * Title Bar in navbar.
     *
     * @var string|null
     */
	public $titleBar;

	/**
     * The Application Name , title akan di tampilkan di browser fav ico.
     *
     * @var string|null
     */
	public $appName;

	/**
     * Parameter untuk membukan halaman admin.
     * contoh http://yourapp.dev/velin
     *
     * @var string|null
     */
	public $backendUrl;

	public function __construct()
	{
		$this->titleBar = config('velin.titleBar');
		$this->appName = config('velin.appName');
		$this->backendUrl = config('velin.backendUrl');
	}

	/**
     * Mengeluarkan Output Dari velin_config.php
     *
     * @param  string
     * @return string|null
     */
	
	public function config($config)
	{
		return config('velin.'.$config);
	}

	/**
     * Segment bawaan laravel hanya di peringkas agar menggunakn $this saja
     *
     * @param  int
     * @return string|null
     */
	public function segment($int)
	{
		return request()->segment($int);
	}

	/**
     * Menggenrate Url Berdasarkan action nya.
     * 
     * @param  string
     * @return string|null
     */
	public function urlBackendAction($action)
	{
		return url($this->segment(1).$this->backendUrl.'/'.$action);
	}


	/**
     * Meredirect Url Berdasarkan action nya.
     * 
     * @param  string
     * @return void
     */
	public function redirectBackendAction($action)
	{
		return redirect($this->urlBackendAction($action));
	}

	public function addMenu($values = [])
	{
		$model = new Menu;

		$exist = $model->findBySlug($values['slug']);

		if(empty($exist->id))
		{
			if($values['parent_id'] != null)
			{
				$parentId = $model->findBySlug($values['parent_id'])->first()->id;

				$values['parent_id'] = $parentId;		
			}

			$model->create($values);
		}
	}

	public function updateMenu($values = [])
	{
		$model = Menu::findBySlug($values['slug']);

		if(!empty($model->id))
		{
			if($values['parent_id'] != null)
			{
				$parentId = $model->findBySlug($values['parent_id'])->first()->id;

				$values['parent_id'] = $parentId;		
			}
			
			$model->update($values);
		}
	}

	public function deleteMenu($slug)
	{
		$model = Menu::findBySlug($slug);

		$model->delete();
	}

}

