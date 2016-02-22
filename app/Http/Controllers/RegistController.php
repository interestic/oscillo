<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegistController extends Controller
{
    public function getIndex()
    {
        return view('pages.regist.index');
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

    public function postIndex()
    {

    }
}
