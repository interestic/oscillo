<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OwmCityMaster extends Model
{
    protected $table = 'owm_city_master';

    public function data_master_import($locale)
    {
        if ($locale == 'all') {
            $cily_json_file = file(storage_path() . '/master/city.list.json');
        } else {
            $cily_json_file = file(storage_path() . '/master/city.list.jp.json');
        }

        $lines = $cily_json_file;
        foreach ($lines as $line_num => $line) {
            $record = (array)json_decode($line);
            $coord = (array)$record['coord'];


            $result = $this->insert(
                [
                    'owm_id' => $record['_id'],
                    'owm_name' => $record['name'],
                    'owm_country' => $record['country'],
                    'owm_lon' => $coord['lon'],
                    'owm_lat' => $coord['lat']
                ]
            );
            if ($result) {
                echo "{$record['name']},{$record['country']} imported. \n";
            }
        }
    }

    public function deleteCity()
    {
        $this->truncate();
    }

    public function getNearCity($data)
    {

        $sql = <<<EOT
select *,
(6371 *
 ACOS(COS(RADIANS({$data['latitude']})) *
   COS(RADIANS(a.owm_lat)) *
   COS(RADIANS(a.owm_lon) -
   RADIANS({$data['longitude']})
  ) + SIN(RADIANS({$data['latitude']})) *
  SIN(RADIANS(a.owm_lat))
 )
) as distance
from
  owm_city_master a
order by distance asc
limit 0,10;
EOT;
        $result = DB::select($sql);

        return $result;
    }

    public function insertCityWether($result)
    {
        $arr = (array)json_decode($result);
        $arr['coord'] = isset($arr['coord']) ? (array)$arr['coord'] : null;
        $arr['weather'] = isset($arr['weather'][0]) ? (array)$arr['weather'][0] : null;
        $arr['main'] = isset($arr['main']) ? (array)$arr['main'] : null;
        $arr['wind'] = isset($arr['wind']) ? (array)$arr['wind'] : null;
        $arr['rain'] = isset($arr['rain']) ? (array)$arr['rain'] : null;
        $arr['clouds'] = isset($arr['clouds']) ? (array)$arr['clouds'] : null;
        $arr['sys'] = isset($arr['sys']) ? (array)$arr['sys'] : null;

        $dw = new DailyWeather();

        $dw->name = isset($arr['name']) ? $arr['name'] : null;

        $dw->coord_lon = isset($arr['coord']['lon']) ? $arr['coord']['lon'] : null;
        //経度
        $dw->coord_lat = isset($arr['coord']['lat']) ? $arr['coord']['lat'] : null;
        $dw->weather_id = isset($arr['weather']['id']) ? $arr['weather']['id'] : null;
        //天気
        $dw->weather_main = isset($arr['weather']['main']) ? $arr['weather']['main'] : null;
        //説明
        $dw->wether_description = isset($arr['weather']['description']) ? $arr['weather']['description'] : null;
        //iconid
        $dw->weather_icon_id = isset($arr['weather']['icon']) ? $arr['weather']['icon'] : null;
        //base
        $dw->base = isset($arr['base']) ? $arr['base'] : null;
        //現在の気温 main.temp
        $dw->now_temp = isset($arr['main']['temp']) ? $arr['main']['temp'] : null;
        //気圧 main.pressure
        $dw->pressure = isset($arr['main']['pressure']) ? $arr['main']['pressure'] : null;
        //湿度 main.humidity
        $dw->humidity = isset($arr['main']['humidity']) ? $arr['main']['humidity'] : null;
        //最低気温 main.min_temp
        $dw->min_temp = isset($arr['main']['temp_min']) ? $arr['main']['temp_min'] : null;
        //最高気温 main.max_temp
        $dw->max_temp = isset($arr['main']['temp_max']) ? $arr['main']['temp_max'] : null;
        //風速 wind.speed
        $dw->wind_speed = isset($arr['wind']['speed']) ? $arr['wind']['speed'] : null;
        //雲 clouds.all %
        $dw->cloud = isset($arr['clouds']['all']) ? $arr['clouds']['all'] : null;
        //計測日時 dt
        $dw->datetime = isset($arr['dt']) ? $arr['dt'] : null;
        //国 country
        $dw->country = isset($arr['sys']['country']) ? $arr['sys']['country'] : null;
        //日の出
        $dw->sunrise = isset($arr['sys']['sunrise']) ? $arr['sys']['sunrise'] : null;
        //日の入
        $dw->sunset = isset($arr['sys']['sunset']) ? $arr['sys']['sunset'] : null;

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
        $dw->rain = isset($arr['rain']) && isset($arr['rain']['3h']) ? $arr['rain']['3h'] : '';
        //雪 snow.3h %
        $dw->snow = isset($arr['snow']) ? $arr['snow'] : '';

        $save_status = $dw->save();

        if ($save_status) {
            return $dw->sys_id;
        }
//        sleep(1);
    }

    public function getCitylist()
    {
        return $this->get();
    }

    public function getWeather($id)
    {
        $WEATHERAPI_ENDPOINT = 'http://api.openweathermap.org/data/2.5/weather';
        $result = @file_get_contents($WEATHERAPI_ENDPOINT . "?id=" . $id . '&APPID=' . env('WEATHER_API'));

        if ($http_response_header[0] == 'HTTP/1.1 200 OK') {
            return $result;
        } else {
            return false;
        }
    }

}
