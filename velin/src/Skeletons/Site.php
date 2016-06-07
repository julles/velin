<?php namespace Velin\Skeletons;
/**
 * Velin Admin Panel - Backend For Laravel 5
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

	/**
     * Menggenerate (Tambah) Menu.
     * contoh bisa dilihat di database/seeds/MenuSeed.php
     * 
     * @param  array|array
     * @return void
     */
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
					$parentId = $model->whereSlug($values['parent_id'])->first()->id;

					$values['parent_id'] = $parentId;		
				}

				$menu = $model->create($values); // insert to menu

				$dataActions = [];

				foreach($actions as $act)
				{
					$actionId = $action->whereSlug($act)->first()->id;

					$dataActions[] = ['menu_id' => $menu->id,'action_id'=>$actionId]; 
				}
				
				$menuAction->insert($dataActions); // insert to menu_actions table
			}
	}

	/**
     * Menggenerate (Update) Menu.
     * contoh bisa dilihat di database/seeds/MenuSeed.php
     * 
     * @param  array|array
     * @return void
     */
	public function updateMenu($values = [],$actions = [])
	{
		$model = Menu::findBySlug($values['slug']);
		$menuAction = new MenuAction();
		$action = new Action();

		if(!empty($model->id))
		{
			if($values['parent_id'] != null)
			{
				$parentId = $model->whereSlug($values['parent_id'])->first()->id;

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

	/**
     * Menggenerate (menghapus) Menu.
     * contoh bisa dilihat di database/seeds/MenuSeed.php
     * 
     * @param  string
     * @return void
     */
	public function deleteMenu($slug)
	{
		$model = Menu::findBySlug($slug);

		$model->delete();
	}

	/**
     * Menginject class model merujuk ke path app/Models/.
     * contoh penggunaan : Velin::injectModel('Modelnya')
     * 
     * @param  string
     * @return obj
     */
	public function injectModel($model)
	{
		$model = "App\\Models\\$model";

		return new $model;
	}

	/**
     * Menginject class App\Models\Menu.
     * contoh penggunaan : Velin::getMenu()->title
     * 
     * @return obj
     */
	public function getMenu()
	{
		$model = Menu::findBySlug($this->segment(2));
		
		return $model;
	}
	
	/**
     * Menginject class App\Models\Action.
     * contoh penggunaan : Velin::getAction()->title
     * 
     * @return obj
     */
	public function getAction()
	{
		$model = Action::whereSlug($this->segment(3))->first();

		return $model;
	}

	/**
     * Generate Label Action ( Titlte Menu | Title Action ).
     * 
     * @return string
     */
	public function labelAction()
	{
		return $this->getMenu()->title.' '.$this->getAction()->title;
	}

	/**
     * Generate Link Create.
     * 
     * @return string
     */
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

	/**
     * Generate Link Delete.
     * 
     * @return string
     */
	public function buttonDelete($id="")
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

	/**
     * Generate Link Update.
     * 
     * @return string
     */
	public function buttonUpdate($id="")
	{
		$attributes = [
			'class' => 'btn btn-success btn-sm',
			'style' => 'font-size:12px;',
		];

		$title = 'Update';

		$url = $this->urlBackendAction('update/'.$id);

		$button=\Html::link($url,$title,$attributes);
		
		return $button;
	}

	/**
     * Generate Link View.
     * 
     * @return string
     */
	public function buttonView($id="")
	{
		$attributes = [
			'class' => 'btn btn-default btn-sm',
			'style' => 'font-size:12px;',
		];

		$title = 'View';

		$url = $this->urlBackendAction('view/'.$id);

		$button=\Html::link($url,$title,$attributes);
		
		return $button;
	}

	public function buttons($id = "" , $plus = [])
	{
		$update =  $this->buttonUpdate($id);
		$delete =  $this->buttonDelete($id);
		$view =  $this->buttonView($id);

		$mergeButton = "";

		foreach($plus as $add)
		{
			$mergeButton .= '|'.$add;
		}

		return $update.'|'.$delete.'|'.$view.$mergeButton;
	}

	/**
     * Generate Flash Message menggunakan sweet alert.
     *
     * @param   array
     * @return string
     */
	public function flash($data=[])
	{
		$data = json_encode($data);

		$str = "
		<script>
			swal($data)
		</script>";

		return $str;
	}

	/**
     * Generate Flash Message (Success) menggunakan sweet alert.
     *
     * @param   string|array
     * @return string
     */
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

	/**
     * Generate Flash Message (Info) menggunakan sweet alert.
     *
     * @param   string|array
     * @return string
     */
	public function flashInfo($text,$attributes = [])
	{	
		$properties = [
			'type' 	=> 'info',
			'title'	=> 'Info',
			'text' => $text,
		];

		$properties = array_merge($properties,$attributes);

		if(\Session::has('info'))
		{
			return $this->flash($properties);
		}
	}


	/**
     * Generate Flash Message Validation menggunakan sweet alert.
     *
     * @param   string|string|array
     * @return string
     */
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

	public function unique($table,$field,$id="")
	{
		if(!empty($id))
		{
			$ifEdit = ','.$field.','.$id;
		}else{
			$ifEdit = "";
		}

		return 'unique:'.$table.$ifEdit;
	}

	public function cekRight($roleId,$menuActionId)
    {
        $model = injectModel('Role')->find($roleId);

        $rights = $model->rights()->select('menu_action_id')->find($menuActionId);

        if(!empty($rights->menu_action_id))
        {
            return true;
        }else{
            return false;
        }
    }
}

