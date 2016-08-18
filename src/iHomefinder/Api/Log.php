<?php

namespace iHomefinder\Api;

class Log {
	
	private static $handlers = [];
	
	public static function addHandler(callable $handler) {
		self::$handlers[] = $handler;
	}
	
	public static function info($value) {
		self::log($value);
	}
	
	public static function time(callable $callback) {
		$start = microtime(true);
		$callback();
		$end = microtime(true);
		$total = $end - $start;
		self::log($total);
	}
	
	private static function log($value) {
		foreach(self::$handlers as $handler) {
			$handler($value);
		}
	}
	
}