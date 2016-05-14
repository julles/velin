<?php

use Illuminate\Database\Seeder;

class MenuSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\Velin::addMenu([
			'parent_id'		=> null,
			'title'			=> 'Development',
			'order'			=> 100,
			'controller'	=> '#',
			'slug'			=> 'development',
		],['index','create','update']);

        // \Velin::updateMenu([
        //     'parent_id'     => null,
        //     'title'         => 'Development',
        //     'order'         => 100,
        //     'controller'    => '#',
        //     'slug'          => 'development',
        // ],['index','create']);

	}
}
