<?php

namespace Jag\Dashboard;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * @var boolean
     */
    protected $defer = false;

    /**
     * Other services.
     *
     * @var array
     */
    protected $otherServices = [
    ];

    /**
     * @return void
     */
    public function boot()
    {
        $this->mergeConfig();
        $this->registerRoutes();
    }

    /**
     * @return void
     */
    public function register()
    {
        // $this->registerOtherServices();
        // $this->registerRoutes();
    }

    /**
     * @return array
     */
    public function provides()
    {
        return ['dashboard'];
    }

    /**
     * Merge the configuration.
     *
     * @return void
     */
    protected function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config.php', 'dashboard'
        );
    }

    protected function registerRoutes()
    {
        Route::prefix(config('dashboard.uri'))
             ->middleware(['web', 'auth'])
             ->name(config('dashboard.uri'). ':')
             ->namespace('Jag\Dashboard\Controllers')
             ->group(__DIR__ . '/../routes/web.php');
    }
}
