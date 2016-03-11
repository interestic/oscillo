<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeedlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seedlogs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('seed_num');
            $table->integer('seed_count');
            $table->integer('parent_seedlog_id');
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
        Schema::drop('seedlogs');
    }
}
