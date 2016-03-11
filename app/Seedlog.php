<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seedlog extends Model
{
    protected $table = "seedlogs";

    public function getHomeSeed($id)
    {

        return $this->where('user_id','=',$id)
            ->orderBy('id','desc')
            ->paginate(10);

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
}
