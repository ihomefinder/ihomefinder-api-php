<?php

namespace iHomefinder\Api;

if(version_compare(PHP_VERSION, "7.0.0") <= 0) {
	throw new \Exception("PHP 7.0.0 or greater is required");
}

spl_autoload_register(function($className) {
	$fileName = __DIR__ . str_replace(__NAMESPACE__, "", $className) . ".php";
	if(file_exists($fileName)) {
		require $fileName;
	}
});