<?php

namespace App\Providers;

use App\Order;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('admin.layout', function($view){
            $view->with('newOrdersCount', Order::where('status', Order::STATUS_DELIVERED)->count());
        });
        view()->composer('admin.layout', function($view){
            $view->with('sawOrdersCount', Order::where('status', 'saw')->count());
        });
        view()->composer('admin.layout', function($view){
            $view->with('roadOrdersCount', Order::where('status', 'road')->count());
        });
        view()->composer('admin.layout', function($view){
            $view->with('successOrdersCount', Order::where('status', 'success')->count());
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
