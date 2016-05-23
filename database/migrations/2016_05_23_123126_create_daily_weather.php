<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_weather', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            //緯度
            $table->double('coord_lon');
            //経度
            $table->double('coord_lat');
            $table->smallInteger('weather_id');
            //天気
            $table->mediumText('weather_main');
            //説明
            $table->text('wether_description');
            //iconid
            $table->mediumText('weather_icon_id');
            //base
            $table->mediumText('base');
            //現在の気温 main.temp
            $table->double('now_temp');
            //気圧 main.pressure
            $table->smallInteger('pressure');
            //湿度 main.humidity
            $table->smallInteger('humidity');
            //最低気温 main.min_temp
            $table->double('min_temp');
            //最高気温 main.max_temp
            $table->double('max_temp');
            //視界 visibility
            $table->integer('visibility');
            //風速 wind.speed
            $table->double('wind_speed');
            //風度 wind.deg
            $table->integer('wind_deg');
            //雲 clouds.all %
            $table->integer('cloud');
            //雨 rain.3h %
            $table->integer('rain');
            //雪 snow.3h %
            $table->integer('snow');
            //計測日時 dt
            $table->integer('datetime');
            //Internal parameter
            $table->integer('sys_type');
            //Internal parameter
            $table->integer('sys_id');
            //Internal parameter
            $table->double('sys_message');
            //国 country
            $table->mediumText('country');
            //日の出
            $table->integer('sunrise');
            //日の入
            $table->integer('sunset');
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
        Schema::drop('daily_weather');
    }
}
