<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            //role name
            $table->string('name');
        });


        DB::table('roles')->insert(
            array(
                'name' => 'Aktyvus'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Administratorius'
            )
        );

        DB::table('roles')->insert(
            array(
                'name' => 'Blokuotas'
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
