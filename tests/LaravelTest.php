<?php

namespace Iamkarsoft\JokerJoker\Tests;

use Iamkarsoft\JokerJoker\Console\JokerJoke;
// use Iamkarsoft\
use Iamkarsoft\JokerJoker\Facades\JokerJoker;
use Iamkarsoft\JokerJoker\JokerJokerServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase {
	/**
	 * Get package providers.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 *
	 * @return array
	 */
	protected function getPackageProviders($app) {
		return [
			JokerJokerServiceProvider::class,
		];
	}

	protected function getPackageAliases($app) {
		return [
			'JokerJoker' => JokerJoke::class,
		];
	}

	/**
	 * @test
	 */

	public function the_console_command_returns_a_joke() {
		$this->withoutMockingConsoleOutput();

		JokerJoker::shouldReceive('getRandomJoke')
			->once()
			->andReturn('some joke');

		$this->artisan('joker-joker');
		$output = Artisan::output();

		$this->assertSame('some joke' . PHP_EOL, $output);
	}

	/**
	 * @test
	 */
	public function the_route_can_be_accessed() {
		JokerJoker::shouldReceive('getRandomJoke')
			->once()
			->andReturn('some joke');

		$this->get('/jokes')
			->assertViewIs('joker-joker::joke')
			->assertViewHas('joke', 'some joke')
			->assertStatus(200);

	}
}
