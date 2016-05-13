<?php
/**
 * Created by PhpStorm.
 * User: do9iigane
 * Date: 2016/05/12
 * Time: 16:27
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Seedlog;
use Illuminate\Support\Facades\Input;

class SeedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get_homeById($id)
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

    /**
     * @return string
     */
    public function post_update()
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
}