<?php
namespace Iamkarsoft\JokerJoker\Http\Controllers;

use Iamkarsoft\JokerJoker\Facades\JokerJoker;

class JokerJokerController {
	public function __invoke() {
		return view('joker-joker::joke', [
			'joke' => JokerJoker::getRandomJoke(),
		]);
	}
}