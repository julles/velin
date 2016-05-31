<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    public $guarded = [];

    public function role()
    {
    	return $this->belongsTo(Role::class,'role_id');
    }

    public function menuAction()
    {
    	return $this->belongsTo(MenuAction::class , 'menu_action_id');
    }
}
