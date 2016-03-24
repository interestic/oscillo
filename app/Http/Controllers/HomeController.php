<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Seedlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_index()
    {
        $data['user_id'] = $this->user_id;

        return view('pages/home/index', $data);
    }

    public function get_dashboard()
    {

        $data['user_id'] = $this->user_id;
        $seedlog = new Seedlog;
        $data['result'] = $seedlog->getSummaryData($this->user_id);

        return view('pages/home/dashboard', $data);
    }
}
