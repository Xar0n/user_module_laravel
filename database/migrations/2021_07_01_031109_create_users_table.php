<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable
 *
 * Миграция создания таблицы users для пользователей
 */
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
           // $table->integer('id', true);
            $table->id();
            $table->boolean('gender');
            $table->string('login', 30)->unique();
            $table->string('password', 32);
            $table->string('fio', 50);
            $table->string('email', 320)->unique()->nullable();
            $table->string('phone', 15)->nullable()->default(null);
            $table->string('telegram', 32)->nullable()->default(null);
            //$table->string('my_snab_sign', 255)->nullable();
            $table->string('avatar', 50)->nullable()->default(null);
            $table->boolean('status')->default(false);
            $table->boolean('fired')->default(false);
            //$table->integer('type')->nullable();
            //$table->integer('truck')->nullable();
            //$table->boolean('not_sign_mode')->nullable();
            //$table->unsignedBigInteger('become_user')->nullable();
            $table->unsignedBigInteger('organization_id')->nullable()->default(null);
            $table->unsignedBigInteger('division_id')->nullable()->default(null);
            $table->unsignedBigInteger('post_id')->nullable()->default(null);
            $table->unsignedBigInteger('location_id')->nullable()->default(null);
            $table->unsignedBigInteger('base_id')->nullable()->default(null);
            //$table->foreign('become_user')->references('id')->on('users');
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
