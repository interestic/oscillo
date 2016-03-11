<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Seedlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['user_id'] = Auth::user()->id;

        $seedlog = new Seedlog();
        $data['home_seed'] = $seedlog->getHomeSeed(Auth::user()->id);

        return view('home',$data);
    }
}
