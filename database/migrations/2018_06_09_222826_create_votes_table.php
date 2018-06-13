<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{

    //https://stackoverflow.com/questions/34897444/naming-tables-in-many-to-many-relationships-laravel?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            //$table->increments('id');
            //$table->timestamps();

            $table->integer('user_id');
            $table->integer('post_id');
            $table->primary(['user_id', 'post_id']);

            $table->boolean('upvote')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
