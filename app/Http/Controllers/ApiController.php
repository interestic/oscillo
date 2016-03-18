<?php

namespace App\Http\Controllers;

use App\Seedlog;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Thujohn\Twitter\Twitter;

class ApiController extends Controller
{
    public function post_twitter($param)
    {
        switch ($param) {
            case 'profile':
                $username = Input::get('username');
                $result = \Twitter::query('users/show', 'GET', ['screen_name' => $username]);
                echo json_encode($result->id);
                break;
            default:
                return false;
        }

    }

    public function post_seedUpdate()
    {
        $data = Input::only('user_id', 'seed');

        $seedlog = new Seedlog();
        $exec_result = $seedlog->upsertData($data);
        Carbon::setLocale('ja');
        $result = [
            'http_status' => 200,
            'status' => $exec_result['status'],
            'seed' => $exec_result['seed'],
            'count' => $exec_result['count'],
            'date' => Carbon::createFromTimestamp(strtotime($exec_result['date']))->diffForHumans()
        ];

        return json_encode($result);
    }

    public function get_seedHomeById($id)
    {
        $seedlog = new Seedlog();
        $result = $seedlog->getHomeSeed($id);

        return response()->json($result,200)->setCallback(Input::get('callback'));
    }

    public function get_dashboardData($id){
        $seedlog = new Seedlog();
        $result = $seedlog->getSummaryData($id);


        foreach (($this->trim_val($result)) as $key => $item) {

            $data[$key] = $item;
        }

        return response()->json($data,200)->setCallback(Input::get('callback'));
    }

    public function trim_val($arr){

        foreach ($arr as $key =>$item) {
            foreach ($item as $value) {
                $return[$key][] = $value;
            }
            yield $return[$key];
        }
    }



}
