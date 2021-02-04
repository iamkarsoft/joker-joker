<?php

namespace Iamkarsoft\JokerJoker;
class JokeFactory {
	protected $jokes = [];

	public function __construct(array $jokes) {
		$this->jokes = $jokes;
	}

	/**
	 * getting random jokes
	 */
	public function getRandomJoke() {
		return $this->jokes[array_rand($this->jokes)];
	}
}