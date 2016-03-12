<?php

namespace Nimfus\RolesManager;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class RolesManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Router $router
     */
    public function boot(Router $router)
    {
        $router->middleware('role', 'Nimfus\RolesManager\Middleware\Role');

        $this->publishes([
            __DIR__.'/Config/roles_manager.php' => config_path('roles_manager.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/Migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/roles_manager.php', 'roles_manager');

        $this->app['RolesManager'] = $this->app->share(function($app) {
            return new RolesManager;
        });
    }
}
