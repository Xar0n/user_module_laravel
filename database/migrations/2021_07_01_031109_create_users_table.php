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
            $table->string('email', 50)->unique()->nullable();
            $table->string('phone', 16)->nullable();
            $table->unsignedBigInteger('organization_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('organization_id')->references('id')->on('users_organizations');
            $table->foreign('location_id')->references('id')->on('users_locations');
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
