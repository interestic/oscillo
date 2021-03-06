<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('url')->after('email');
            $table->string('team')->after('url');
            $table->string('location')->after('team');
//            $table->unique(['name','email']);
            $table->unique(['name']);
            $table->unique(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['url','team', 'location']);
            $table->dropIndex('users_name_unique');
            $table->dropIndex('users_email_unique');
        });
    }
}
