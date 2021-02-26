<?php

namespace App\Providers;


use App\Service\FactureService;
use App\Service\ServiceImpl\FactureServiceImpl;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FactureService::class, function () {
            return new FactureServiceImpl();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        schema::defaultStringLength(191);
    }
}
