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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->boolean('gender');
            $table->string('login', 30)->unique();
            $table->string('password', 32);
            $table->string('fio', 50);
            $table->string('email', 320)->unique()->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('telegram', 32)->nullable();
            //$table->string('my_snab_sign', 255)->nullable();
            $table->string('avatar', 50)->nullable();
            $table->boolean('status');
            $table->boolean('fired');
            //$table->integer('type')->nullable();
            //$table->integer('truck')->nullable();
            //$table->boolean('not_sign_mode')->nullable();
            $table->unsignedBigInteger('become_user')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->unsignedBigInteger('base_id')->nullable();
            $table->foreign('become_user')->references('id')->on('users');
            $table->foreign('organization_id')->references('id')->on('users_organizations');
            $table->foreign('division_id')->references('id')->on('users_divisions');
            $table->foreign('post_id')->references('id')->on('users_posts');
            $table->foreign('location_id')->references('id')->on('users_locations');
            $table->foreign('base_id')->references('id')->on('users_bases');
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
