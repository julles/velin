<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAction extends Model
{
    protected $table = 'menu_actions';

    public $guarded = [];

    public function menu()
    {
    	return $this->belongsTo(Menu::class,'menu_id');
    }

    public function action()
    {
    	return $this->belongsTo(Action::class,'action_id');
    }
}
