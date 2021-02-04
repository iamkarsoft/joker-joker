<?php

namespace Iamkarsoft\JokerJoker\Tests;
use Iamkarsoft\JokerJoker\JokeFactory;
use PHPUnit\Framework\TestCase;

class JokeFactoryTest extends TestCase {

	/**
	 * @test
	 */
	public function it_returns_a_joke() {
		$jokes = new JokeFactory([
			'This is a joke',
		]);
		$joke = $jokes->getRandomJoke();
		$this->assertSame('This is a joke', $joke);
	}

	/**
	 * @test
	 */
	public function it_returns_a_chuck_norris_joke() {
		$chuckJokes = [
			'Chuck Norris can strangle you with a cordless phone',
			'Chuck Norris doesn’t wear a watch. He decides what time it is.',
		];
		$jokes = new JokeFactory();
		$joke = $jokes->getRandomJoke();
		$this->assertContains($joke, $chuckJokes);
	}

}