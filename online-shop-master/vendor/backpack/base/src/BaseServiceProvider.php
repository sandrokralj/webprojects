<?php

namespace Backpack\Base;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Route;

class BaseServiceProvider extends ServiceProvider
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
    public function boot(\Illuminate\Routing\Router $router)
    {
        // LOAD THE VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/backpack/base'), 'backpack');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'backpack');

        $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'backpack');

        $this->setupRoutes($this->app->router);

        // PUBLISH FILES
        // publish config file
        $this->publishes([__DIR__.'/config' => config_path()], 'config');
        // publish lang files
        $this->publishes([__DIR__.'/resources/lang' => resource_path('lang/vendor/backpack')], 'lang');
        // publish views
        $this->publishes([__DIR__.'/resources/views' => resource_path('views/vendor/backpack/base')], 'views');
        // publish error views
        $this->publishes([__DIR__.'/resources/error_views' => resource_path('views/errors')], 'errors');
        // publish public Backpack assets
        $this->publishes([__DIR__.'/public' => public_path('vendor/backpack')], 'public');
        // publish public AdminLTE assets
        $this->publishes([base_path('vendor/almasaeed2010/adminlte') => public_path('vendor/adminlte')], 'adminlte');

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/backpack/base.php', 'base'
        );
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // register the 'admin' middleware
        $router->middleware('admin', app\Http\Middleware\Admin::class);

        $router->group(['namespace' => 'Backpack\Base\app\Http\Controllers'], function ($router) {
            // All BackPack routes are placed under the 'admin' prefix, to minimize possible conflicts with your application. This means your login/logout/register urls are also under the 'admin' prefix, so you can have separate logins for users and admins.
            Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
                // Admin authentication routes
                Route::auth();

                // Other Backpack\Base routes
                Route::get('dashboard', 'AdminController@dashboard');
                Route::get('/', function () {
                    // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
                    return redirect('admin/dashboard');
                });
            });
        });
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('base', function ($app) {
            return new Base($app);
        });
    }
}
