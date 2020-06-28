<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\ProdutoRepositoryInterface',
            'App\Repositories\ProdutoRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\FilialRepositoryInterface',
            'App\Repositories\FilialRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\ClienteRepositoryInterface',
            'App\Repositories\ClienteRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\UsuarioRepositoryInterface',
            'App\Repositories\UsuarioRepository'
        );

    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
