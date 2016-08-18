<?php

namespace iHomefinder\Api\Exception;

class InvalidArgumentException extends ApiException {
	
	public function __construct($value, $expected) {
		parent::__construct(gettype($value) . " provided, however " . $expected . " was expected");
	}
	
}