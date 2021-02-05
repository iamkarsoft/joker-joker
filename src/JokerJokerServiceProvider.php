<?php

namespace Iamkarsoft\JokerJoker;
use Iamkarsoft\JokerJoker\JokeFactory;
use Illuminate\Support\ServiceProvider;

class JokerJokerServiceProvider extends ServiceProvider {
	public function boot() {

	}

	public function register() {
		$this->app->bind('joker-joker', function () {
			return new JokeFactory();
		});
	}
}
