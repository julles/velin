<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Velin;
use App\Models\Role;

class User extends Model
{
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $guarded = ['verify_password'];

    public function rules($id="")
    {
    	return [
    		'name'	=> 'required|max:255',
    		'username'	=> 'required|max:15|'.Velin::unique('users','username',$id),
    		'email'    => 'required|'.Velin::unique('users','username',$id),
            'role_id'	=> 'required',
            'password'  => 'required',
            'verify_password'   => 'same:password',
    	];
    }

    public function role()
    {
        return $this->belongsTo(Role::class,'role_id');
    }
}
