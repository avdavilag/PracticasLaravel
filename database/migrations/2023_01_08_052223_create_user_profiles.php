<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('bio',1000);
            $table->string('twitter')->nullable();
            $table->unsignedBigInteger('profession_id');
            $table->foreign('profession_id')
            ->references('id')
            ->on('professions');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');
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
        Schema::dropIfExists('user_profiles');
    }
}
