<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Velin;

class Role extends Model
{
    public $guarded = [];

    public function rules($id)
    {
    	return [
    		'role'	=> Velin::unique('roles','role',$id),
    	];
    }
}
