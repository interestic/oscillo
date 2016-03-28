<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seedlog extends Model
{
    protected $table = "seedlogs";

    /**
     * @param $user_id
     * @return mixed
     */
    public function getHomeSeed($user_id)
    {
        $result = $this->where('user_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return $result;

    }

    /**
     * @param $data
     * @return array
     */
    public function upsertData($data)
    {

        $last_data = $this->get()->last();

        $this->seed_num = $data['seed'];

        $date = date('Y-m-d H:i:s');
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

    /**
     * @param $user_id
     * @return mixed
     */
    public function getSummaryData($user_id)
    {
        $sql = <<<EOT
SELECT
  substring(created_at, 1, 10) AS x,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=1 AND (substring(created_at, 1, 10))=x) as angry,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=2 AND (substring(created_at, 1, 10))=x) as unhappy,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=3 AND (substring(created_at, 1, 10))=x) as tongue,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=4 AND (substring(created_at, 1, 10))=x) as cry,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=5 AND (substring(created_at, 1, 10))=x) as devil,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=6 AND (substring(created_at, 1, 10))=x) as displeased,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=7 AND (substring(created_at, 1, 10))=x) as grin,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=8 AND (substring(created_at, 1, 10))=x) as happy,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=9 AND (substring(created_at, 1, 10))=x) as laugh,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=10 AND (substring(created_at, 1, 10))=x) as sleep,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=11 AND (substring(created_at, 1, 10))=x) as squint,
  (select CASE WHEN sum(seed_count)>0 THEN sum(seed_count) ELSE 0 END from seedlogs WHERE seed_num=12 AND (substring(created_at, 1, 10))=x) as surprised
   FROM seedlogs
   GROUP BY x
EOT;

        $result = DB::select($sql);

        return $result;
    }
}
