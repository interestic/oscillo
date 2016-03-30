<?php
namespace App\Providers;

use Carbon\Carbon;
use Form;
use Illuminate\Support\ServiceProvider;

class MacroServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro('numseed', function ($expression,$key) {

            $seed[0] = ['icon' => 'wink2', 'style' => 'warning'];
            $seed[1] = ['icon' => 'laugh', 'style' => 'warning'];
            $seed[2] = ['icon' => 'grin', 'style' => 'warning'];
            $seed[3] = ['icon' => 'squint', 'style' => 'warning'];
            $seed[4] = ['icon' => 'angry', 'style' => 'alert'];
            $seed[5] = ['icon' => 'devil', 'style' => 'alert'];
            $seed[6] = ['icon' => 'unhappy', 'style' => 'alert'];
            $seed[7] = ['icon' => 'cry', 'style' => ''];
            $seed[8] = ['icon' => 'displeased', 'style' => ''];
            $seed[9] = ['icon' => 'sleep', 'style' => ''];
            $seed[10] = ['icon' => 'happy', 'style' => 'success'];
            $seed[11] = ['icon' => 'tongue', 'style' => 'success'];
            $seed[12] = ['icon' => 'surprised', 'style' => 'success'];

            return $seed[$expression][$key];
        });

        Form::macro('timago', function($time){
            Carbon::setLocale('ja');
            return Carbon::createFromTimestamp(strtotime($time))->diffForHumans();

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}