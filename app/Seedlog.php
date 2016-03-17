<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seedlog extends Model
{
    protected $table = "seedlogs";

    public function getHomeSeed($user_id)
    {
        $result = $this->where('user_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $result;

    }

    public function upsertData($data)
    {

        $last_data = $this->get()->last();

        $this->seed_num = $data['seed'];

        $date = date('Y-m-d h:i:s');
        if ($last_data['seed_num'] == $this->seed_num) {
            $last_data->seed_count = (int)$last_data['seed_count'] + 1;
            $result = $last_data->save();

            return [
                'status' => $result,
                'seed' => $data['seed'],
                'count' => $last_data->seed_count,
                'date' => $date
            ];
        } else {
            $this->seed_count = 1;
            $this->user_id = $data['user_id'];
            $result = $this->save();

            return [
                'status' => $result,
                'seed' => $data['seed'],
                'count' => $this->seed_count,
                'date' => $date
            ];
        }
    }

    public function getSummaryData($user_id)
    {
        $sql = <<<EOT
SELECT
     substring(created_at, 1, 10) AS unique_date,
  (select sum(seed_count) from seedlogs WHERE seed_num=1 AND (substring(created_at, 1, 10))=unique_date) as num1,
  (select sum(seed_count) from seedlogs WHERE seed_num=2 AND (substring(created_at, 1, 10))=unique_date) as num2,
  (select sum(seed_count) from seedlogs WHERE seed_num=3 AND (substring(created_at, 1, 10))=unique_date) as num3,
  (select sum(seed_count) from seedlogs WHERE seed_num=4 AND (substring(created_at, 1, 10))=unique_date) as num4,
  (select sum(seed_count) from seedlogs WHERE seed_num=5 AND (substring(created_at, 1, 10))=unique_date) as num5,
  (select sum(seed_count) from seedlogs WHERE seed_num=6 AND (substring(created_at, 1, 10))=unique_date) as num6,
  (select sum(seed_count) from seedlogs WHERE seed_num=7 AND (substring(created_at, 1, 10))=unique_date) as num7,
  (select sum(seed_count) from seedlogs WHERE seed_num=8 AND (substring(created_at, 1, 10))=unique_date) as num8,
  (select sum(seed_count) from seedlogs WHERE seed_num=9 AND (substring(created_at, 1, 10))=unique_date) as num9,
  (select sum(seed_count) from seedlogs WHERE seed_num=10 AND (substring(created_at, 1, 10))=unique_date) as num10,
  (select sum(seed_count) from seedlogs WHERE seed_num=11 AND (substring(created_at, 1, 10))=unique_date) as num11,
  (select sum(seed_count) from seedlogs WHERE seed_num=12 AND (substring(created_at, 1, 10))=unique_date) as num12
   FROM seedlogs
   GROUP BY unique_date;
EOT;

        $result = DB::select($sql);

        return $result;
    }
}
