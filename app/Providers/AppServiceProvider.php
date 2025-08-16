<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Share supported locales to all views
        $locales = [];
        try {
            $rows = DB::table('locales')->select('id','code','name')->orderBy('id')->get();
            foreach ($rows as $r) {
                $locales[] = ['id' => $r->id, 'code' => $r->code, 'name' => $r->name];
            }
        } catch (\Throwable $e) {
            // Fallback if DB not ready
            $supported = config('laravellocalization.supportedLocales', []);
            foreach ($supported as $code => $meta) {
                $locales[] = ['id' => null, 'code' => $code, 'name' => $meta['name'] ?? $code];
            }
        }
        View::share('locales', $locales);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
