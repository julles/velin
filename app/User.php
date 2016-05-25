<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;

class User extends Authenticatable
{
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // public $guarded = ['verify_password'];

    // public function rules($id="")
    // {
    // 	return rules[
    // 		'name'	=> 'required|max:255',
    // 		'username'	=> 'required|max:15|'.Velin::unique('users','username',$id),
    // 		'role_id'	=> 'required'
    // 	];
    // }

    // public function role()
    // {
    //     return $this->belongsTo(Role::class,'role_id');
    // }
}
