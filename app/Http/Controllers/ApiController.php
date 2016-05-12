<?php

namespace App\Http\Controllers;

use App\OwmCityMaster;
use App\Seedlog;
use Carbon\Carbon;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

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
