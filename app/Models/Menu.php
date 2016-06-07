<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Menu extends Model
{
	use SluggableTrait;

    protected $table = 'menus';

    public $guarded = [];

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    public function childs()
    {
    	return $this->hasMany(Menu::class , 'parent_id');
    }

    public function actions()
    {
        return $this->belongsToMany(Action::class,'menu_actions')
            ->withPivot('id');
    }
}
