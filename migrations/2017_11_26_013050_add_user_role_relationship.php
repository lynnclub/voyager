<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserRoleRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('voyager_users', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->change();
            $table->foreign('role_id')->references('id')->on('voyager_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('voyager_users', function (Blueprint $table) {
            $table->dropForeign(['role_id']);
        });

        Schema::table('voyager_users', function (Blueprint $table) {
            $table->bigInteger('role_id')->change();
        });
    }
}
