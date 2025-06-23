<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use App\Models\Logo;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share logo with all views
        View::composer('*', function ($view) {
            $view->with('logo', Logo::first() ?? (object) []);

            $routeName = Route::currentRouteName();

            // Optional: Convert route name to a readable page title
            $pageTitle = ucwords(str_replace('.', ' ', $routeName)); // e.g., "product.index" → "Product Index"

            $view->with('pageTitle', $pageTitle);

            Blade::directive('active', function ($route) {
                return "<?php echo Route::is($route) ? 'active' : ''; ?>";
            });
        });
    }
}
