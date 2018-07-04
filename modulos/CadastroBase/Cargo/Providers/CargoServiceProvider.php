<?php

namespace Modulos\CadastroBase\Cargo\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class CargoServiceProvider extends ServiceProvider{

    //quando a aplicacao eh iniciada
    public function boot(){

        Route::namespace('Modulos\CadastroBase\Cargo\Http\Controllers')
            ->group(__DIR__.'/../Routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../Migrations');

    }

    //quando a aplicacao eh registrada
    public function register(){

    }

}