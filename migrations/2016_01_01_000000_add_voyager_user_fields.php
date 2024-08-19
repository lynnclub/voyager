<?php

use Illuminate\Database\Migrations\Migration;

class AddVoyagerUserFields extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::rename('users', 'voyager_users');
        Schema::rename('password_resets', 'voyager_password_resets');

        Schema::table('voyager_users', function ($table) {
            if (!Schema::hasColumn('voyager_users', 'avatar')) {
                $table->string('avatar')->nullable()->after('email')->default('users/default.png');
            }
            $table->bigInteger('role_id')->nullable()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        if (Schema::hasColumn('voyager_users', 'avatar')) {
            Schema::table('voyager_users', function ($table) {
                $table->dropColumn('avatar');
            });
        }
        if (Schema::hasColumn('voyager_users', 'role_id')) {
            Schema::table('voyager_users', function ($table) {
                $table->dropColumn('role_id');
            });
        }
    }
}
