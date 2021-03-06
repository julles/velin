<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldRoleIdInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->string('username',15)->index();
        
             $table->foreign('role_id')->references('id')
                ->on('roles')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });

        \DB::table('users')
            ->insert([
                'role_id'   => 1,
                'name'      => 'Super Admin',
                'username'  => 'superadmin',
                'password'  => \Hash::make('superadmin'),
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('role_id','username');
        });
    }
}
