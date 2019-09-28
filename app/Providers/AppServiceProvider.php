<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('inputtextbox', function ($field) {
            return "<?php echo \App\InputBox::text($field); ?>";
        });

        // Tác động lên all views (*)
        View::composer('*', 'App\TeamPointsComposer');
    }
}
