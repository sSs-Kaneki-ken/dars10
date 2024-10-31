<?php

namespace App\Providers;

use App\Models\Universitet;
use App\Models\Facultet;
use App\Models\Leaning;
use App\Models\Group;
use App\Models\Course;
use App\Models\Student;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        Paginator::useBootstrap();
    }
}
