<?php

namespace iHomefinder\Api\exception;

class ApiException extends RuntimeException {

	public function ApiException() {
		super();
	}
	
	public function ApiException(Throwable $e) {
		super($e);
	}
	
	public function ApiException($message) {
		super(message);
	}
	
}