<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        config([
            'laravellocalization.supportedLocales' => [
                'pt' => ['name' => 'Portuguese', 'script' => 'Latn', 'native' => 'português'],
                'es' => ['name' => 'Spanish', 'script' => 'Latn', 'native' => 'español'],
                'en' => ['name' => 'English', 'script' => 'Latn', 'native' => 'English'],
            ],
            'laravellocalization.useAcceptLanguageHeader' => true,
            'laravellocalization.hideDefaultLocaleInURL' => true,
        ]);
    }
}
