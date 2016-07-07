<?php

namespace Gerardojbaez\Vehicle;

use Illuminate\Support\ServiceProvider;

class VehicleServiceProvider extends ServiceProvider
{
    /**
     * Commands
     *
     * @var array
     */
    protected $commands = [
        'Gerardojbaez\Vehicle\Commands\GenerateVehiclesData',
        'Gerardojbaez\Vehicle\Commands\ExportVehiclesData',
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/vehicles.php' => config_path('vehicles.php')
        ], 'config');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/VehicleTablesSeeder.php' => database_path('seeds/VehicleTablesSeeder.php')
        ], 'seeds');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register commands...
        $this->commands($this->commands);
    }
}
