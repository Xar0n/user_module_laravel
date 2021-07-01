<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRightsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_rights_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('right_id');
            $table->unsignedBigInteger('role_id');
            $table->foreign('right_id')->references('id')->on('users_rights')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('users_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_rights_roles');
    }
}
