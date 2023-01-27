<?php

namespace Hamdan\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
        ]);

        $this->publishes([
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
        ]);

        $this->publishes([
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);

        /** Code By HAMDAN */

        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands(
            'Hamdan\CrudGenerator\Commands\CrudCommand',
            'Hamdan\CrudGenerator\Commands\CrudControllerCommand',
            'Hamdan\CrudGenerator\Commands\CrudModelCommand',
            'Hamdan\CrudGenerator\Commands\CrudMigrationCommand',
            'Hamdan\CrudGenerator\Commands\CrudViewCommand',
            'Hamdan\CrudGenerator\Commands\CrudLangCommand',
            'Hamdan\CrudGenerator\Commands\CrudApiCommand',
            'Hamdan\CrudGenerator\Commands\CrudApiControllerCommand'
        );
    }
}
