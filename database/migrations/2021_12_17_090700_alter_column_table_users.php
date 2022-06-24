<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {
            $table->string('name')->nullable(true)->change();
            $table->dropUnique(['email']);
            $table->string('email')->nullable(true)->change();
            $table->string('username')->unique();
            $table->string('guid')->nullable(true);
            $table->string('domain')->nullable(true);
            $table->string('firstname')->nullable($value = true);
            $table->string('lastname')->nullable($value = true);
            $table->string('usr_lvl')->default('customer');
            $table->integer('active')->default(1); //not login
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //
        Schema::table('users', function($table) {
            $table->string('name')->nullable($value = false)->change();
            $table->string('email')->unique()->nullable($value = false)->change();
            $table->dropColumn(['username','guid','domain','firstname','lastname','usr_lvl','active']);

            //$table->string('name')->unique(false)->change();

        });

        /* turn off foreign key checks for a moment */
        //DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        /* set null values to 0 first */
        //DB::statement('UPDATE `users` SET `user_id` = 0 WHERE `user_id` IS NULL;');
        /* alter table */
        //DB::statement('ALTER TABLE `users` MODIFY `user_id` INTEGER UNSIGNED NOT NULL;');
        /* finally turn foreign key checks back on */
        //DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::dropIfExists('users');
    }
}
