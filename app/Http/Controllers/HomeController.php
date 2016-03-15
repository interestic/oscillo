<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Seedlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controllers instance.
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

        return view('home',$data);
    }
}
