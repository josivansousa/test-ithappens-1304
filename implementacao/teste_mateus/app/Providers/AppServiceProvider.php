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

        $this->app->bind(
            'App\Repositories\Contracts\FormaPagamentoRepositoryInterface',
            'App\Repositories\FormaPagamentoRepository'
        );
        
        $this->app->bind(
            'App\Repositories\Contracts\PedidoEstoqueRepositoryInterface',
            'App\Repositories\PedidoEstoqueRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\ItemPedidoRepositoryInterface',
            'App\Repositories\ItemPedidoRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\EstoqueRepositoryInterface',
            'App\Repositories\EstoqueRepository'
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
