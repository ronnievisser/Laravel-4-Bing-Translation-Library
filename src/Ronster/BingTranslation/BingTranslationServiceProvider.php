<?php namespace Ronster\BingTranslation;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Config;

class BingTranslationServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
            $this->package( 'ronster/bingtranslation' );
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$this->app[ 'bing' ] = $this->app->share( function( $app ) {
			require_once( 'lib/BingTranslate.class.php' );

			$api_key = Config::get( 'bingtranslation::api_key' );
			
			$translator = new \BingTranslateWrapper( $api_key );
			return $translator;
		});

		// Shortcut so developers don't need to add an Alias in app/config/app.php
        $this->app->booting( function() {
	        $loader = AliasLoader::getInstance();
	        $loader->alias( 'Bing', 'Ronster\BingTranslation\Facades\Bing' );
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides() {
		return array();
	}

}