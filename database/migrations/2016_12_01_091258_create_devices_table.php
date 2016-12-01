<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('social_platforms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('user_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('device_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
            $table->foreign('device_id')->references('devices')->on('id')->onDelete('cascade');
        });

        Schema::create('user_social_platforms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('social_platform_id')->unsigned();
            $table->string('profile')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
            $table->foreign('social_platform_id')->references('socials_platforms')->on('id')->onDelete('cascade');
        });

        Schema::create('user_interests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('interest_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('users')->on('id')->onDelete('cascade');
            $table->foreign('interest_id')->references('interests')->on('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
        Schema::dropIfExists('social_platforms');
        Schema::dropIfExists('interests');
        Schema::dropIfExists('user_devices');
        Schema::dropIfExists('user_social_platforms');
        Schema::dropIfExists('user_interests');
    }
}
