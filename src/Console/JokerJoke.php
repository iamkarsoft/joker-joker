<?php

namespace Iamkarsoft\JokerJoker\Console;
use Iamkarsoft\JokerJoker\Facades\JokerJoker;
use Illuminate\Console\Command;

class JokerJoke extends Command {

	protected $signature = 'joker-joker';

	protected $description = 'output a funny joke';

	public function handle() {
		$this->info(JokerJoker::getRandomJoke());
	}
}