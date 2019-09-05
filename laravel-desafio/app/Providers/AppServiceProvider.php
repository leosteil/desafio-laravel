<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Repositories\Agenda\AgendaRepositoryInterface', 'App\Repositories\Agenda\AgendaRepositoryEloquent'
        );

        $this->app->bind(
            'App\Repositories\Atividade\AtividadeRepositoryInterface', 'App\Repositories\Atividade\AtividadeRepositoryEloquent'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
