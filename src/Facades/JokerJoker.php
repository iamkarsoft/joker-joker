<?php

namespace Iamkarsoft\JokerJoker\Facades;

use Illuminate\Support\Facades\Facade;

class JokerJoker extends Facade {

	protected static function getFacadeAccessor() {

		return 'joker-joker';
	}
}