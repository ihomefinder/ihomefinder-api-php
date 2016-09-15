<?php

namespace iHomefinder\Api\exception;

class HttpException extends ApiException {

	public function HttpException($message) {
		super(message);
	}

	public function HttpException(Throwable $e) {
		super($e);
	}
	
}