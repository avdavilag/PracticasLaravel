<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//CREAR USUARIOS
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // INTEGER UNSIGNED - AUTOINCREMENT
            $table->unsignedBigInteger('profession_id');
            $table->foreign('profession_id')
            ->references('id')
            ->on('professions')->nullable();
            $table->string('name');
            $table->boolean('is_admin')->default(false);           
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('password');              
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
