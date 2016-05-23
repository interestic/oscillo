<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

class OWMController extends Controller
{

    public function post_latlon()
    {
        $data = Input::only('latitude', 'longitude');

        $ocm = new OwmCityMaster();

        return json_encode($ocm->getNearCity($data));
    }

    public function get_listAndInsertCityWether()
    {

        $ocm = new OwmCityMaster();
        $alldata = $ocm->get();

        foreach ($alldata as $item) {

            $WEATHERAPI_ENDPOINT = 'http://api.openweathermap.org/data/2.5/weather';
            $result = @file_get_contents($WEATHERAPI_ENDPOINT . "?id=" . $item->owm_id . '&APPID=' . env('WEATHER_API'));

//            Log::info(var_export($http_response_header, true));

            if ($http_response_header[0] == 'HTTP/1.1 200 OK') {

                Log::info(var_export(json_decode($result), true));

                $arr = (array)json_decode($result);
                $arr['coord'] = isset($arr['coord']) ? (array)$arr['coord'] : null;
                $arr['weather'] = isset($arr['weather'][0]) ? (array)$arr['weather'][0] : null;
                $arr['main'] = isset($arr['main']) ? (array)$arr['main'] : null;
                $arr['wind'] = isset($arr['wind']) ? (array)$arr['wind'] : null;
                $arr['rain'] = isset($arr['rain']) ? (array)$arr['rain'] : null;
                $arr['clouds'] = isset($arr['clouds']) ? (array)$arr['clouds'] : null;
                $arr['sys'] = isset($arr['sys']) ? (array)$arr['sys'] : null;

                $dw = new DailyWeather();

                $dw->name = $arr['name'];

                $dw->coord_lon = $arr['coord']['lon'];
                //経度
                $dw->coord_lat = $arr['coord']['lat'];
                $dw->weather_id = $arr['weather']['id'];
                //天気
                $dw->weather_main = $arr['weather']['main'];
                //説明
                $dw->wether_description = $arr['weather']['description'];
                //iconid
                $dw->weather_icon_id = $arr['weather']['icon'];
                //base
                $dw->base = $arr['base'];
                //現在の気温 main.temp
                $dw->now_temp = $arr['main']['temp'];
                //気圧 main.pressure
                $dw->pressure = $arr['main']['pressure'];
                //湿度 main.humidity
                $dw->humidity = $arr['main']['humidity'];
                //最低気温 main.min_temp
                $dw->min_temp = $arr['main']['temp_min'];
                //最高気温 main.max_temp
                $dw->max_temp = $arr['main']['temp_max'];
                //風速 wind.speed
                $dw->wind_speed = $arr['wind']['speed'];
                //雲 clouds.all %
                $dw->cloud = $arr['clouds']['all'];
                //計測日時 dt
                $dw->datetime = $arr['dt'];
                //国 country
                $dw->country = $arr['sys']['country'];
                //日の出
                $dw->sunrise = $arr['sys']['sunrise'];
                //日の入
                $dw->sunset = $arr['sys']['sunset'];

                //Internal parameter
                $dw->sys_type = isset($arr['sys']['type']) ? $arr['sys']['type'] : '';
                //Internal parameter
                $dw->sys_id = isset($arr['sys']['id']) ? $arr['sys']['id'] : '';
                //Internal parameter
                $dw->sys_message = isset($arr['sys']['message']) ? $arr['sys']['message'] : '';

                //視界 visibility
                $dw->visibility = isset($arr['visibility']) ? $arr['visibility'] : '';
                //風度 wind.deg
                $dw->wind_deg = isset($arr['wind']['deg']) ? $arr['wind']['deg'] : '';
                //雨 rain.3h %
                $dw->rain = isset($arr['rain']) ? $arr['rain']['3h'] : '';
                //雪 snow.3h %
                $dw->snow = isset($arr['snow']) ? $arr['snow'] : '';

                $save_status = $dw->save();
                sleep(2);
//            return $save_status;

                Log::info($item->owm_id);
            }
        }


    }
    //
}
