<?php
/**
 * Example :
 *
 * Generate Parent Menu:
 *     \Velin::addMenu([
            'parent_id'     => null,
            'title'         => 'Development',
            'order'         => 100,
            'controller'    => '#',
            'slug'          => 'development',
        ],[]);

    Generate Child Menu : 
        \Velin::addMenu([
                'parent_id'     => 'development',
                'title'         => 'Action',
                'order'         => 1,
                'controller'    => 'ActionController',
                'slug'          => 'action',
            ],['index','update','delete','create']);

    Updating Menu : 

        \Velin::updateMenu([
                'parent_id'     => 'development',
                'title'         => 'Action',
                'order'         => 1,
                'controller'    => 'ActionController',
                'slug'          => 'action',
            ],['index','update','delete','create']);

    Delete Menu : 
        \Velin::deleteMenu('slug');
 */


use Illuminate\Database\Seeder;

class MenuSeed extends Seeder
{
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
