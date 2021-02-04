<?php

namespace Iamkarsoft\JokerJoker;
class JokeFactory {
	protected $jokes = [
		'Chuck Norris can strangle you with a cordless phone',
		'Chuck Norris doesn’t wear a watch. He decides what time it is.',
	];

	public function __construct(array $jokes = null) {

		if ($jokes) {
			$this->jokes = $jokes;
		}
	}

	/**
	 * getting random jokes
	 */
	public function getRandomJoke() {
		return $this->jokes[array_rand($this->jokes)];
	}
}