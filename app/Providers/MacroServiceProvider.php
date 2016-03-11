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

            $seed[0] = ['icon' => 'wink2', 'style' => 'alert'];
            $seed[1] = ['icon' => 'angry', 'style' => 'alert'];
            $seed[2] = ['icon' => 'unhappy', 'style' => 'secondary'];
            $seed[3] = ['icon' => 'tongue', 'style' => ''];
            $seed[4] = ['icon' => 'cry', 'style' => ''];
            $seed[5] = ['icon' => 'devil', 'style' => 'alert'];
            $seed[6] = ['icon' => 'displeased', 'style' => 'warning'];
            $seed[7] = ['icon' => 'grin', 'style' => 'success'];
            $seed[8] = ['icon' => 'happy', 'style' => 'warning'];
            $seed[9] = ['icon' => 'laugh', 'style' => 'secondary'];
            $seed[10] = ['icon' => 'sleep', 'style' => 'secondary'];
            $seed[11] = ['icon' => 'squint', 'style' => 'warning'];
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