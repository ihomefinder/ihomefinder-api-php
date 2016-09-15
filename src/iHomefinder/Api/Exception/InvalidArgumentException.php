<?php

namespace iHomefinder\Api\exception;

class InvalidArgumentException extends ApiException {

	public function InvalidArgumentException($value, string $expected) {
		super(get_class($value) + " provided, however " + $expected + " was expected");
	}
	
}