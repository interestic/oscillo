<?php

use App\OwmCityMaster;

class OwmCityMasterControllerTest extends TestCase
{
    /**
     * @test
     * @dataProvider for_getWeather
     * @param $id
     */
    public function getWeather($id, $assert)
    {
        $ocm = new OwmCityMaster();

        $result = $ocm->getWeather($id);

        $this->assertContains($result, \GuzzleHttp\json_encode($assert));
    }

    public function for_getWeather()
    {
        return [
            [12, ["cod" => "404", "message" => "Error: Not found city"]],
            [1857578,[
                "coord" => [
                    "lon" => 133.95,
                    "lat" => 34.25
                ],
                "weather" => [[
                        "id" => 800,
                        "main" => "Clear",
                        "description" => "clear sky",
                        "icon" => "01n"
                ]],
                "base" => "stations",
                "main" => [
                    "temp" => 297.16,
                    "pressure" => 1013,
                    "humidity" => 36,
                    "temp_min" => 295.37,
                    "temp_max" => 299.15
                ],
                "visibility" => 10000,
                "wind" => ["speed" => 0.5],
                "clouds" => ["all" => 0],
                "dt" => 1463998894,
                "sys" => [
                    "type" => 1,
                    "id" => 7587,
                    "message" => 0.0127,
                    "country" => "JP",
                    "sunrise" => 1463947018,
                    "sunset" => 1463997923
                ],
                "id" => 1857578,
                "name" => "Matoba",
                "cod" => 200
            ]]
        ];

    }
}
