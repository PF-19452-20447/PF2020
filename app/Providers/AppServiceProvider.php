<?php

namespace App\Providers;

use App\Helpers\Eupago;
use App\Helpers\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('setting',function(){
            return new Setting();
        });
        $this->app->bind('eupago',function(){
            return new Eupago();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
