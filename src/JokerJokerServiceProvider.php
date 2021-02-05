<?php

namespace Iamkarsoft\JokerJoker;
use Iamkarsoft\JokerJoker\Console\JokerJoke;
use Iamkarsoft\JokerJoker\Facades\JokerJoker;
use Iamkarsoft\JokerJoker\Http\Controllers\JokerJokerController;
use Iamkarsoft\JokerJoker\JokeFactory;
use Illuminate\Foundation\config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\mergeConfigFrom;
use Illuminate\Support\ServiceProvider;

class JokerJokerServiceProvider extends ServiceProvider {
	public function boot() {
		if ($this->app->runningInConsole()) {
			$this->commands([
				JokerJoke::class,
			]);
		}

		// load views
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'joker-joker');

		// publish views

		$this->publishes([
			__DIR__ . '/../resources/views' => resource_path('views/vendor/joker-joker'),
		], 'views');

		//publishing config file

		$this->publishes([
			__DIR__ . '/../config/joker-joker.php' => base_path('config/joker-joker.php'),
		], 'config');
		//routing
		Route::get(config('joker-joker.route'), JokerJokerController::class);
	}

	public function register() {
		$this->app->bind('joker-joker', function () {
			return new JokeFactory();
		});

		$this->mergeConfigFrom(__DIR__ . '/../config/joker-joker.php', 'joker-joker');
	}
}
