<?php

use App\User;

class ApiControllerTest extends TestCase
{
    /**
     * @test
     * @param $id
     */
    public function get_seedHomeById_notLogin()
    {
        $this->visit('http://127.0.0.1:9999/api/seed/home-by-id/1')->seeText('Forgot Your Password');
    }

    /**
     * @ test
     */
    public function get_seedHomeById_isLogin()
    {
        $user = new User(array('name' => 'test'));
        $this->be($user);

        $this->visit('http://127.0.0.1:9999/api/seed/home-by-id/1')->seeText('total');
        $this->visit('http://127.0.0.1:9999/api/seed/home-by-id/1')->seeJsonContains(['prev_page_url' => null]);
    }

    /**
     * @test
     */
    public function get_dashboardData_notLogin()
    {
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('Forgot Your Password');
    }

    /**
     * @ test
     */
    public function get_dashboardData_isLogin()
    {
        $user = new User(array('name' => 'test'));
        $this->be($user);

        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('angry');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('unhappy');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('tongue');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('cry');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('devil');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('displeased');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('happy');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('laugh');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('sleep');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('squint');
        $this->visit('http://127.0.0.1:9999/api/seed/dashboard-data/1')->seeText('surprised');

    }

    /**
     * @test
     *
     */
    public function post_latlon()
    {
        $parameter['latitude'] = '35.689499';
        $parameter['longitude'] = '139.691711';

        $this->json('POST', '/api/owm/latlon', $parameter)
            ->seeJsonContains([
                    "distance" => null,
                    "id" => 15,
                    "owm_country" => "JP",
                    "owm_id" => 1850144,
                    "owm_lat" => 35.689499,
                    "owm_lon" => 139.691711
                ]);
    }

    /**
     * @test
     */
    public function get_listAndInsertCityWether(){

        $result = $this->call('GET', '/api/list-and-insert-city-wether');

    }
}
