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
		],[]);

            \Velin::addMenu([
                'parent_id'     => 'development',
                'title'         => 'Action',
                'order'         => 1,
                'controller'    => 'ActionController',
                'slug'          => 'action',
            ],['index','update','delete','create']);

    }
}
