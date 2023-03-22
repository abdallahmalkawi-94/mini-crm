<?php

namespace App\Providers;

use App\Repositories\Concretes\Eloquent\CompanyEloquentRepository;
use App\Repositories\Concretes\Eloquent\EmployeeEloquentRepository;
use App\Repositories\Interfaces\CompanyInterface;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CompanyInterface::class, CompanyEloquentRepository::class);
        $this->app->bind(EmployeeInterface::class, EmployeeEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
    }
}
