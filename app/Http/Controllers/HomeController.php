<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Seedlog;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    static $uesr_id = 0;

    /**
     * HomeController constructor.
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_index()
    {
        $data['user_id'] = $this->user_id;

        return view('pages/home/index', $data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get_dashboard()
    {

        $data['user_id'] = $this->user_id;
        $seedlog = new Seedlog;
        $data['result'] = $seedlog->getSummaryData($this->user_id);

        return view('pages/home/dashboard', $data);
    }
}
