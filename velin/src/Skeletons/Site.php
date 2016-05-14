<?php namespace Velin\Skeletons;
/**
 * Velin Admin Panel - Baceknd For Laravel 5
 *
 * @author   Muhamad Reza Abdul Rohim <reza.wikrama3@gmail.com>
 * 
 */
use DB;
use App\Models\Menu;
use App\Models\MenuAction;
use App\Models\Action;

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

	public function urlBackend($slug)
	{
		return url($this->backendUrl.'/'.$slug);
	}

	/**
     * Menggenrate Url Berdasarkan action nya.
     * 
     * @param  string
     * @return string|null
     */
	public function urlBackendAction($action)
	{
		return $this->urlBackend($this->segment(2).'/'.$action);
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

	public function addMenu($values = [],$actions = [])
	{
		$model = new Menu();
		$menuAction = new MenuAction();
		$action = new Action();

		$exist = $model->findBySlug($values['slug']);

		if(empty($exist->id))
		{
			if($values['parent_id'] != null)
			{
				$parentId = $model->findBySlug($values['parent_id'])->first()->id;

				$values['parent_id'] = $parentId;		
			}

				$menu = $model->create($values); // insert to menu

				$dataActions = [];

				foreach($actions as $act)
				{
					$actionId = $action->whereSlug($act)->first()->id;

					$dataActions[] = ['menu_id' => $menu->id,'action_id'=>$actionId]; 
				}
				
				$menuAction->insert($dataActions);

			}
	}

	public function updateMenu($values = [],$actions = [])
	{
		$model = Menu::findBySlug($values['slug']);
		$menuAction = new MenuAction();
		$action = new Action();

		if(!empty($model->id))
		{
			if($values['parent_id'] != null)
			{
				$parentId = $model->findBySlug($values['parent_id'])->first()->id;

				$values['parent_id'] = $parentId;		
			}
			
				$model->update($values);

				$menuAction->whereMenuId($model->id)->delete();
				
				$dataActions = [];

				foreach($actions as $act)
				{
					$actionId = $action->whereSlug($act)->first()->id;

					$dataActions[] = ['menu_id' => $model->id,'action_id'=>$actionId]; 
				}
				
				$menuAction->insert($dataActions);
		}
	}

	public function deleteMenu($slug)
	{
		$model = Menu::findBySlug($slug);

		$model->delete();
	}

	public function injectModel($model)
	{
		$model = "App\\Models\\$model";

		return new $model;
	}

	public function getMenu()
	{
		$model = Menu::findBySlug($this->segment(2));
		
		return $model;
	}
	
	public function getAction()
	{
		$model = Action::whereSlug($this->segment(3))->first();

		return $model;
	}

	public function labelAction()
	{
		return $this->getMenu()->title.' '.$this->getAction()->title;
	}

	public function buttonCreate()
	{
		$attributes = [
			'class' => 'btn btn-primary btn-sm',
			'style' => 'font-size:12px;'
		];

		$title = 'Add New';

		$url = $this->urlBackendAction('create');

		$button=\Html::link($url,$title,$attributes);
		
		return $button;
	}

	public function buttonDelete($id)
	{
		$attributes = [
			'class' => 'btn btn-danger btn-sm',
			'style' => 'font-size:12px;',
			'onclick'	=> 'return confirm("are you sure want to delete this item ?")'
		];

		$title = 'Delete';

		$url = $this->urlBackendAction('delete/'.$id);

		$button=\Html::link($url,$title,$attributes);
		
		return $button;
	}

	public function buttonUpdate($id)
	{
		$attributes = [
			'class' => 'btn btn-primary btn-sm',
			'style' => 'font-size:12px;',
		];

		$title = 'Update';

		$url = $this->urlBackendAction('update/'.$id);

		$button=\Html::link($url,$title,$attributes);
		
		return $button;
	}

	public function buttons()
	{
		//
	}

	public function flash($data)
	{
		$data = json_encode($data);

		$str = "
		<script>
			swal($data)
		</script>";

		return $str;
	}

	public function flashSuccess($text,$attributes = [])
	{	
		$properties = [
			'type' 	=> 'success',
			'title'	=> 'Success',
			'text' => $text,
		];

		$properties = array_merge($properties,$attributes);

		if(\Session::has('success'))
		{
			return $this->flash($properties);
		}
	}

	public function flashValidation($title,$text,$attributes = [])
	{	
		$properties = [
			'type' 	=> 'error',
			'title'	=> $title,
			'text'  => $text,
			'html'	=> true,
		];

		$properties = array_merge($properties,$attributes);

		return $this->flash($properties);
	}
}

