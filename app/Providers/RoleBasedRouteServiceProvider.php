<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RoleBasedRouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        $this->mapWebRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(function () {
                if (Gate::allows('admin-only', auth()->user())) {
                    require base_path('routes/admin.php');
                } elseif (Gate::allows('nurse-only', auth()->user())) {
                    require base_path('routes/user.php');
                } elseif (Gate::allows('nurse-only', auth()->user())) {
                    require base_path('routes/user.php');
                } else {
                    require base_path('routes/guest.php');
                }
            });
    }
}