<?php

namespace Iamkarsoft\JokerJoker;
use GuzzleHttp\Client;

class JokeFactory {

	const API_ENDPOINT = 'http://api.icndb.com/jokes/random';
	protected $client;

	public function __construct(client $client = null) {
		$this->client = $client ?: new client();
	}

	/**
	 * getting random jokes
	 */
	public function getRandomJoke() {

		$response = $this->client->get(self::API_ENDPOINT);

		$joke = json_decode($response->getBody()->getContents());

		return $joke->value->joke;
	}
}