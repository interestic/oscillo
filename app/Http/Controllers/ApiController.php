<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Thujohn\Twitter\Twitter;

class ApiController extends Controller
{
    public function post_twitter($param)
    {
        switch ($param) {
            case 'profile':
                $username = Input::get('username');
                $result = \Twitter::query('users/show','GET',['screen_name'=>$username]);
                echo json_encode($result->id);
                break;
            default:
                return false;
        }

    }
}
