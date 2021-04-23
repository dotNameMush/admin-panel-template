<?php

namespace App\Providers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Pagination\Paginator;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

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
        Blade::if('hasCourse', function ($expression) {
            if (Auth::user()) {
                if (Auth::user()->hasAnyCourse($expression)) {
                    return true;
                }
            }

            return false;
        });
    }
}
