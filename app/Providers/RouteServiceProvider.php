<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapHomeRoutes();
        $this->mapAdminRoutes();
        $this->mapMobileRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    // home
    protected function mapHomeRoutes()
    {
        Route::prefix('home')
             ->middleware(['web', 'auth'])
             ->namespace($this->namespace . '\Home')
             ->group(base_path('routes/home.php'));
    }

    // admin
    protected function mapAdminRoutes()
    {
        Route::prefix('admin')
             ->middleware(['web', 'auth:admin', 'admin.rbac'])
             ->namespace($this->namespace . '\Admin')
             ->group(base_path('routes/admin.php'));
    }

    // mobile
    protected function mapMobileRoutes()
    {
        Route::prefix('m')
             ->middleware(['web'])
             ->namespace($this->namespace . '\Mobile')
             ->group(base_path('routes/mobile.php'));
    }
}
