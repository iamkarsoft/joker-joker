<?php

namespace Iamkarsoft\JokerJoker;
use Iamkarsoft\JokerJoker\Console\JokerJoke;
use Iamkarsoft\JokerJoker\Facades\JokerJoker;
use Iamkarsoft\JokerJoker\Http\Controllers\JokerJokerController;
use Iamkarsoft\JokerJoker\JokeFactory;
use Illuminate\Support\Facades\Route;
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
		]);
		//routing
		Route::get('jokes', JokerJokerController::class);
	}

	public function register() {
		$this->app->bind('joker-joker', function () {
			return new JokeFactory();
		});
	}
}
