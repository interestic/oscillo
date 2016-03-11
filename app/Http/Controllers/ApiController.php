<?php

namespace App\Http\Controllers;

use App\Seedlog;
use Illuminate\Http\Request;

use App\Http\Requests;
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

    public function post_seedlog()
    {
        $data = Input::only('user_id', 'seed');

        $seedlog = new Seedlog();
        $exec_result = $seedlog->upsertData($data);

        $result = [
            'http_status' => 200,
            'status' => $exec_result['status'],
            'seed' => $exec_result['seed'],
            'count' => $exec_result['count']
        ];

        return json_encode($result);
    }
}
