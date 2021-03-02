<?php

namespace App\Providers;


use App\Service\BoutiqueService;
use App\Service\FactureService;
use App\Service\LivraisonService;
use App\Service\ModeLivraisonService;
use App\Service\ServiceImpl\BoutiqueServiceImpl;
use App\Service\ServiceImpl\FactureServiceImpl;
use App\Service\ServiceImpl\LivraisonImpl;
use App\Service\ServiceImpl\ModeLivraisonServiceImpl;
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
        $this->app->bind(ModeLivraisonService::class, function () {
            return new ModeLivraisonServiceImpl();
        });
        $this->app->bind(LivraisonService::class, function () {
            return new LivraisonImpl();
        });
        $this->app->bind(BoutiqueService::class, function () {
            return new BoutiqueServiceImpl();
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
