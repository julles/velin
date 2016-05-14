<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Action extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'actions';

    public $guarded = [];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    public function rules()
    {
    	return [
    		'title'		=> 'required',
    	];
    }

    public function menus()
    {
    	return $this->belongsToMany(Menu::class,'menu_actions');
    }
}
