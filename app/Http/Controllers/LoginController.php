<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller
{
    public function getIndex()
    {
        return view('pages.login.index');
    }

    public function getReminder($uri = null)
    {
        $view_prefix = 'pages.login.reminder.';
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

    // postでhello/goodmorningにアクセスされた場合
    public function postReminder()
    {
    }

    // getでhello/goodmorning/messageでアクセスされた場合
//    public function getGoodmorning($message)
//    {
//    }
}
