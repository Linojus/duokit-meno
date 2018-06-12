<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_types', function (Blueprint $table) {
            $table->increments('id');
            //role name
            $table->string('name');
        });


        DB::table('post_types')->insert(
            array(
                'name' => 'Kūrinys'
            )
        );

        DB::table('post_types')->insert(
            array(
                'name' => 'Paslauga'
            )
        );

        DB::table('post_types')->insert(
            array(
                'name' => 'Kita'
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
        Schema::dropIfExists('post_types');
    }
}
