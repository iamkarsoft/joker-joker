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
}