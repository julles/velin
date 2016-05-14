<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    public $guarded = [];

    public function rules()
    {
    	return [
    		'title'		=> 'required',
    		'action'	=> 'required',	
    	];
    }

    public function menus()
    {
    	return $this->belongsToMany(Menu::class,'menu_actions');
    }
}
