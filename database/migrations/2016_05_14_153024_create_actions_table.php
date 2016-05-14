<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->index();
            $table->timestamps();
        });

        $actions = ['index','create','update','delete','publish','view'];

        $datas = [];

        $no = 0;

        foreach($actions as $action)
        {
            $no++;

            $datas[] = ['id'=>$no,'title'=> ucfirst($action),'slug'=>$action];
        }

        \DB::table('actions')->insert($datas);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('actions');
    }
}
