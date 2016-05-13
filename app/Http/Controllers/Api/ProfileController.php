<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function post_get()
    {
        $user_id = Input::get('user_id');
        $user = new User();
        return json_encode($user->getProfile($user_id));
    }
}
