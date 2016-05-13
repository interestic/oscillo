<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    static $uesr_id = 0;

    /**
     * Create a new controllers instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        if(is_object(Auth::user())){
            $this->user_id = Auth::user()->id;
        }else{
            redirect('/');
        }
    }

    public function getIndex()
    {
        $data['user_id'] = $this->user_id;

        return view('pages.settings.index', $data);
    }
}
