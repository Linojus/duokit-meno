<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');

            //post info
            $table->string('title');
            $table->text('body', 320); //description
            $table->integer('category_id'); //painting, sculpture, applied arts
            $table->integer('type_id'); //artwork, service, etc

            //sale info
            $table->boolean('forSale')->default(false);
            $table->double('price')->default(0.00);

            $table->boolean('disabled')->default(false);

            //timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
