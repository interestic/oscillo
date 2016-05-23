<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OwmCityMaster extends Model
{
    protected $table = 'owm_city_master';

    public function data_master_import()
    {
        $lines = file(storage_path() . '/master/city.list.jp.json');

        // 配列をループしてHTMLをHTMLソースとして表示し、行番号もつけます。
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
            var_dump($result);
        }
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

}
