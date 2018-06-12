<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            //credentials
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('role_id')->default(1);

            //personal info
            $table->string('nickname')->unique();
            $table->string('name');
            $table->string('surname');
            $table->text('description', 320)->nullable();
            $table->text('contacts', 160)->nullable();

            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
}
