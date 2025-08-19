<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('admin.master', function ($view) {
            $setting = Setting::first();
            $view->with('setting', $setting);
        });
    }
}
