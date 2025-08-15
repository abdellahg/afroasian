<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider {
	public function register()
	{
		config([
			'laravellocalization.supportedLocales' => [
				'pt' => array( 'name' => 'Portuguese', 'script' => 'Latn', 'native' => 'português' ),
				'es'  => array( 'name' => 'Spanish', 'script' => 'Latn', 'native' => 'español' ),
				'en'  => array( 'name' => 'English', 'script' => 'Latn', 'native' => 'English' ),
			],

			'laravellocalization.useAcceptLanguageHeader' => true,

			'laravellocalization.hideDefaultLocaleInURL' => true
		]);
	}

}