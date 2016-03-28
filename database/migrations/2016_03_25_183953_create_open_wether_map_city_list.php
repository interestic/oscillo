<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenWetherMapCityList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owm_city_master', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owm_id');
            $table->text('owm_name');
            $table->mediumText('owm_country');
            $table->double('owm_lon');
            $table->double('owm_lat');
        });

        $owm = new \App\OwmCityMaster();
        $owm->data_master_import();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('owm_city_master');
    }
}
