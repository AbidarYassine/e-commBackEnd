<?php

namespace App\Providers;


use App\Service\BoutiqueService;
use App\Service\FactureService;
use App\Service\LivraisonService;
use App\Service\ModeLivraisonService;
use App\Service\PrivillegeService;
use App\Service\RemarqueService;
use App\Service\ServiceImpl\BoutiqueServiceImpl;
use App\Service\ServiceImpl\FactureServiceImpl;
use App\Service\ServiceImpl\LivraisonImpl;
use App\Service\ServiceImpl\ModeLivraisonServiceImpl;
use App\Service\ServiceImpl\PrivillegeServiceImpl;
use App\Service\ServiceImpl\RemarqueServiceImpl;
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
        $this->app->bind(PrivillegeService::class, function () {
            return new PrivillegeServiceImpl();
        });
        $this->app->bind(RemarqueService::class, function () {
            return new RemarqueServiceImpl();
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
