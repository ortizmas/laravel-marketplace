<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
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
        //Registra qualquer serviço da aplicação
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Inicializa qualquer serviço da aplicação
        Schema::defaultStringLength(191);
        \PagSeguro\Library::initialize();
        \PagSeguro\Library::cmsVersion()->setName("Marketplace")->setRelease("1.0.0");
        \PagSeguro\Library::moduleVersion()->setName("Marketplace")->setRelease("1.0.0");
    }
}
