<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('LOG_DB')) {
            DB::listen(function ($query) {
                $sql = str_replace(['?'], ['\'%s\''], $query->sql);
                Log::info(
                    vsprintf($sql, $query->bindings)
                );
            });
        }
    }
}
