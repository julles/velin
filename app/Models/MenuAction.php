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

    public function roles()
    {
        return $this->belongsToMany(Role::class,'rights','role_id','menu_action_id');
    }
}
