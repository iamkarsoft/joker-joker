<?php

namespace Iamkarsoft\JokerJoker\Tests;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use Iamkarsoft\JokerJoker\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase {

	/**
	 * @test
	 */
	public function it_returns_a_random_joke() {

		$mock = new MockHandler([
			new Response(200, [], '{
"type": "success",
"value": {
"id": 292,
"joke": "If you were somehow able to land a punch on Chuck Norris your entire arm would shatter upon impact. This is only in theory, since, come on, who in their right mind would try this?",
"categories": []
}
}')
		]);

		$handler = HandlerStack::create($mock);
		$client = new Client(['handler' => $handler]);

		$jokes = new JokeFactory($client);

		$joke = $jokes->getRandomJoke();

		$this->assertSame('If you were somehow able to land a punch on Chuck Norris your entire arm would shatter upon impact. This is only in theory, since, come on, who in their right mind would try this?', $joke);
	}

}