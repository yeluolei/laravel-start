<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

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
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('username');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();

            $table->unique('uuid', 'uuid');
            $table->unique('email', 'email');
            $table->unique('username', 'username');
            $table->unique('phone', 'phone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
