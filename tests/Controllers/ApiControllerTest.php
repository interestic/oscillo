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
        $this->visit('http://127.0.0.1:9999/api/seed-home-by-id/1')->seeText('Forgot Your Password');
    }

    /**
     * @test
     */
    public function get_seedHomeById_isLogin()
    {
        $user = new User(array('name' => 'test'));
        $this->be($user);

        $this->visit('http://127.0.0.1:9999/api/seed-home-by-id/1')->seeText('total');
        $this->visit('http://127.0.0.1:9999/api/seed-home-by-id/1')->seeJsonContains(['prev_page_url'=>null]);
    }
}
