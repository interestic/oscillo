<?php

namespace App\Http\Controllers;

use App\OwmCityMaster;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $param
     * @return bool
     */
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

    /**
     * @return string
     */
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

    /**
     * @param $id
     * @return mixed
     */
    public function get_seedHomeById($id)
    {
        $seedlog = new Seedlog();
        $result = $seedlog->getHomeSeed($id);

        return response()->json($result,200)->setCallback(Input::get('callback'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get_dashboardData($id){
        $seedlog = new Seedlog();
        $result = $seedlog->getSummaryData($id);
        return response()->json($result,200)->setCallback(Input::get('callback'));
    }

    public function post_latlon(){
        $data = Input::only('latitude', 'longitude');

        $ocm = new OwmCityMaster();

        return json_encode($ocm->getNearCity($data));
    }


//    public function trim_val($arr){
//
//        $seed[0] = ['icon' => 'wink2', 'style' => 'alert'];
//        $seed[1] = ['icon' => 'angry', 'style' => 'alert'];
//        $seed[2] = ['icon' => 'unhappy', 'style' => 'secondary'];
//        $seed[3] = ['icon' => 'tongue', 'style' => ''];
//        $seed[4] = ['icon' => 'cry', 'style' => ''];
//        $seed[5] = ['icon' => 'devil', 'style' => 'alert'];
//        $seed[6] = ['icon' => 'displeased', 'style' => 'warning'];
//        $seed[7] = ['icon' => 'grin', 'style' => 'success'];
//        $seed[8] = ['icon' => 'happy', 'style' => 'warning'];
//        $seed[9] = ['icon' => 'laugh', 'style' => 'secondary'];
//        $seed[10] = ['icon' => 'sleep', 'style' => 'secondary'];
//        $seed[11] = ['icon' => 'squint', 'style' => 'warning'];
//        $seed[12] = ['icon' => 'surprised', 'style' => 'success'];
//
//
//        foreach ($arr as $key =>$item) {
//            foreach ($item as $k => $v) {
//                if($k=='unique_date'){
//                    $return[$key]['x'] = $v;
//                }else{
//                    $return[$key][$seed[$k]] = $v;
//                }
//
//            }
//            yield $return[$key];
//        }
//    }



}
