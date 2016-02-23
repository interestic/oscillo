<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
class RegistController extends Controller
{
    public function getIndex()
    {
        $facebook_link = Socialite::with('facebook')->redirect()->getTargetURL();
        $github_link = Socialite::with('github')->redirect()->getTargetURL();
        $twitter_link = Socialite::with('twitter')->redirect()->getTargetURL();

        return view('pages.regist.index',compact('facebook_link','github_link', 'twitter_link'));
    }

    public function getSignup($uri = null)
    {
        $view_prefix = 'pages.regist.signup.';
        switch ($uri) {
            case 'confirm':
                $template = $view_prefix . 'confirm';
                break;
            case 'done':
                $template = $view_prefix . 'done';
                break;
            default:
                $template = $view_prefix . 'index';
                break;

        }

        return view($template);
    }

    public function postSignup($uri = null)
    {

        var_dump(Input::only('email','password'));

        $view_prefix = 'pages.regist.signup.';
        switch ($uri) {
            case 'confirm':
                $template = $view_prefix . 'confirm';
                break;
            case 'done':
                $template = $view_prefix . 'done';
                break;
            default:
                $template = $view_prefix . 'index';
                break;

        }

        return view($template);
    }
}
