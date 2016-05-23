<?php

namespace App\Console\Commands;

use App\OwmCityMaster;
use Illuminate\Console\Command;

class DailyWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'batch:owm
                            {mode : import-city,maintenance-city}
                            {locale=jp : jp | all}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weather from open weather map APIs.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        switch ($this->argument('mode')) {
            case 'import-city':
                $this->importCity();
                break;
            case 'delete-city':
                $this->deleteCity();
                break;
            case 'weather-insert':
                $this->getWeatherInsert();
                break;
            default:
                $this->info('not set mode. check the Reference. php artisan batch:owm -h');
                break;
        }
    }

    public function importCity()
    {

        $this->info('start:' . __FUNCTION__);
        $owm = new OwmCityMaster();

        $owm->data_master_import($this->argument('locale'));

        $this->info(__FUNCTION__ . 'complete');
    }

    public function deleteCity()
    {
        $this->info('start:' . __FUNCTION__);
        $owm = new OwmCityMaster();

        $owm->deleteCity();

        $this->info(__FUNCTION__ . 'complete');
    }

    public function getWeatherInsert()
    {
        $this->info('start:' . __FUNCTION__);

        $owm = new OwmCityMaster();

        $list = $owm->getCitylist();

        foreach ($list as $item) {
            $result = $owm->getWeather($item->owm_id);

            if ($result) {
                $id = $owm->insertCityWether($result);
                $this->info($id . ' : success.');
            } else {
                $this->error($item->owm_id . ' : error.');
            }
        }

        $owm->insertCityWether($list);

        $this->info(__FUNCTION__ . 'complete');
    }
}
