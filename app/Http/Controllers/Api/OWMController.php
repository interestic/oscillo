<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;

class OWMController extends Controller
{

    public function post_latlon()
    {
        $data = Input::only('latitude', 'longitude');

        $ocm = new OwmCityMaster();

        return json_encode($ocm->getNearCity($data));
    }

}
