<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Seedlog extends Model
{
    protected $table = "seedlogs";

    public function upsertData($data){

        $last_data = $this->get()->last();

        $this->seed_num = $data['seed'];

        if($last_data['seed_num'] == $this->seed_num){
            $last_data->seed_count = (int) $last_data['seed_count']+1;
            $result = $last_data->save();
            return ['status'=>$result,'seed'=>$data['seed'],'count'=>$last_data->seed_count];
        }else{
            $this->seed_count = 1;
            $this->user_id = $data['user_id'];
            $result = $this->save();

            return ['status'=>$result,'seed'=>$data['seed'],'count'=>$this->seed_count];
        }
    }
}
