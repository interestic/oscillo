<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\OwmCityMaster;
use Illuminate\Support\Facades\Input;

class OWMController extends Controller
{

    public function post_latlon()
    {
        $data = Input::only('latitude', 'longitude');

        $ocm = new OwmCityMaster();

        return json_encode($ocm->getNearCity($data));
    }

}
