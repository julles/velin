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
			'title'			=> 'Bapak',
			'order'			=> 1,
			'controller'	=> 'DashboardController',
			'slug'			=> 'bapak',
		]);

			\Velin::addMenu([
				'parent_id'		=> 'bapak',
				'title'			=> 'Anak',
				'order'			=> 1,
				'controller'	=> 'AnakController',
				'slug'			=> 'anak',
			]);

    }
}
