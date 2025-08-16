<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class ConfigServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $supported = null;
        try {
            if (DB::connection()->getPdo()) {
                $rows = DB::table('locales')->select('code','name')->get();
                if ($rows && $rows->count() > 0) {
                    $supported = [];
                    foreach ($rows as $r) {
                        $supported[$r->code] = [
                            'name' => $r->name,
                            'script' => 'Latn',
                            'native' => $r->name,
                        ];
                    }
                }
            }
        } catch (\Throwable $e) {
            // DB not ready during early boot (e.g., before migrations). Fallback below.
        }

        if (!$supported) {
            $supported = [
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English'],
                'es' => ['name' => 'Spanish', 'script' => 'Latn', 'native' => 'español'],
                'pt' => ['name' => 'Portuguese', 'script' => 'Latn', 'native' => 'português'],
            ];
        }

        config([
            'laravellocalization.supportedLocales' => $supported,
            'laravellocalization.useAcceptLanguageHeader' => true,
            'laravellocalization.hideDefaultLocaleInURL' => true,
        ]);
    }
}
