<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            //role name
            $table->string('name');
        });

        $data = array(
            array('name' => 'Tapyba'),
            array('name' => 'Piešimas'),
            array('name' => 'Grafika'),
            array('name' => 'Skulptūra'),
            array('name' => 'Juvelyrika'),
            array('name' => 'Amatai'),
            array('name' => 'Kita')
        );

        DB::table('categories')->insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
