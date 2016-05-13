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
        return json_encode($user->get_profile($user_id));
    }

    public function post_update()
    {
        $profile_string = Input::get('profile');
        $profile = json_decode($profile_string,true);


        $user = new User();

        if ($user->validate($profile)) {

//            $user->id = $profile['id'];
            $user->email = $profile['email'];
            $user->url = $profile['url'];
            $user->team = $profile['team'];
            $user->location = $profile['location'];

            return json_encode($user->save());
        } else {
            return json_encode($err = $user->errors());
        }

;

    }
}
