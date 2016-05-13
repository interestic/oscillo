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
        $profile = json_decode($profile_string, true);


        $user = new User();

        if ($user->validate($profile)) {

            $user_id = $profile['id'];
//            $user->id = $profile['id'];
            $user->email = $profile['email'];
            $user->url = $profile['url'];
            $user->team = $profile['team'];
            $user->location = $profile['location'];

            return json_encode($user->where('id', $user_id)->update($profile));
        } else {
            return json_encode($err = $user->errors());
        };

    }

//    public function post_updateName($key = 'name')
//    {
//
//        $profile_string = Input::get($key_name = 'name');
//
////        $profile = json_decode($profile_string, true);
//
//        $user = new User();
//
//        if ($user->validate([$key_name=>$profile_string])) {
//
//            $user->$key_name = $profile_string;
////            $user->id = $profile['id'];
////            $user->email = $profile['email'];
////            $user->url = $profile['url'];
////            $user->team = $profile['team'];
////            $user->location = $profile['location'];
//
//            return json_encode($user->save());
//        } else {
//            return json_encode($err = $user->errors());
//        }
//
//    }
}
