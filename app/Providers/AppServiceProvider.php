<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Controllers\home\IndexController;
use App\Http\Controllers\home\BbsController;
use App\Http\Controllers\home\LbtsController;
use App\Http\Controllers\home\WebsController;
use App\Http\Controllers\home\LinksController;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('data',IndexController::getFlei());
        View::share('Bbs',BbsController::Bbs());
        View::share('lbts',LbtsController::index());
        View::share('webs',WebsController::index());
        View::share('links',LinksController::index());
        
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
