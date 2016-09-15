<?php

namespace iHomefinder\Api\exception;

use \iHomefinder\Api\Resource;

class UnsavedResourceException extends ApiException {

	public function UnsavedResourceException(Resource $resource) {
		super("Resource has not been saved");
	}
	
}