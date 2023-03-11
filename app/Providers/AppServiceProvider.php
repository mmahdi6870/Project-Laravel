<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('duit', function ($expression) {
            return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
        });
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        Paginator::useBootstrapFive();

        Gate::define('admin', function (User $user) {
            return $user->is_admin === 1;
        });
    }
}
