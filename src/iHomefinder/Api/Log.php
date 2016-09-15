<?php

namespace iHomefinder\Api;

class Log {
	
	public static function debug($value) {
		if(Constants::DEBUG) {
			var_dump($value);
		}
	}
	
}
