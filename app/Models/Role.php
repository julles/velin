<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Velin;
use App\Models\User;

class Role extends Model
{
    public $guarded = [];

    public function rules($id="")
    {
    	return [
    		'role'	=> 'required|'.Velin::unique('roles','role',$id),
    	];
    }

    public function user()
    {
    	return $this->hasMany(User::class,'role_id');
    }

    public function rights()
    {
        return $this->belongsToMany(MenuAction::class,'rights','role_id','menu_action_id');
    }
}
