<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class TalentController extends Controller
{
    public function index()
    {

    }

    public function getSearch()
    {
        return View('pages.talent.search.index');
    }

    public function postSearch()
    {
        return View('pages.talent.search.result');
    }

    public function getCreate($uri = null)
    {

        $view_prefix = 'pages.talent.create.';
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

    public function postCreate($uri = null)
    {
        $view_prefix = 'pages.talent.create.';
        switch ($uri) {
            case 'confirm':
                echo 'post confirm';
                $template = $view_prefix . 'confirm';
                $redirect = '/talent/create/done';
                break;
            case 'done':
                echo 'post done';
                $template = $view_prefix . 'done';
                break;
            default:
                echo 'post index';

                $pageOgj = new Page();
                $input = Input::all();
                if ($pageOgj->validate($input)) {
                    $pageOgj->save();
                    $last_todo = $pageOgj->id;
                    $pages = Todo::whereId($last_todo)->get();
                } else {
                    $err = $pageOgj->errors();
                }

                $template = $view_prefix . 'index';
                $redirect = '/talent/create/confirm';
                break;

        }

        if (!isset($err)) {
            return redirect($redirect);
        } else {
            return view($template);
        }


    }
}
