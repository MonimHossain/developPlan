<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   //for avoiding migration length error
        Schema::defaultStringLength(191);
        //share this common data accross the application
         view()->share(['commonclass'=>\App::make('CommonClass'),'sl'=>1,'month'=>['JANUARY','FEBRUARY','MARCH','APRIL','MAY','JUNE','JULY','AUGUEST','SEPTEMBER','OCTOBER','NOVEMBER','DECEMBER','']]);
         

        //status share 
         view()->composer('*',function($view){
             $view->with('new_project_status',[1=>'DPP Not Found',2=>'DPP Found',3=>'PEC Done']);
         });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \App::bind('CommonClass', function()
        {
            return new \App\Classes\CommonClass;
        });
    }
}
