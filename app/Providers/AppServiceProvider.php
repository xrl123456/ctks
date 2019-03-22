<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Http\Controllers\home\IndexController;
use App\Http\Controllers\admin\LoginController;
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
        View::share('common_admin_user',LoginController::Admin_user());
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
