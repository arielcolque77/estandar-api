<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));


            $modulePath = app_path('Modules');
            $moduleIterator = new \DirectoryIterator($modulePath);
            foreach ($moduleIterator as $moduleInfo) {
                // Check if it's a directory and not "." or ".."
                if ($moduleInfo->isDir() && !$moduleInfo->isDot()) {
                    $httpPath = $moduleInfo->getPathname() . '/Http';

                    // Check if the "Http" directory exists
                    if (file_exists($httpPath)) {
                        $routesPath = $httpPath . '/Routes';

                        // Check if the "Routes" directory exists
                        if (file_exists($routesPath)) {
                            $routeIterator = new \DirectoryIterator($routesPath);
                            foreach ($routeIterator as $route) {
                                // Check if it's a file (not a directory or dot)
                                if (!$route->isDir() && !$route->isDot()) {
                                    Route::middleware('web')
                                        ->namespace($this->namespace)
                                        ->group($route->getPathname());
                                }
                            }
                        }
                    }
                }
            }
        });
    }
}
