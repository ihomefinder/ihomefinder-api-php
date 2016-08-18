<?php

namespace iHomefinder\Api\Exception;

use iHomefinder\Api\Resource;

class UnsavedResourceException extends ApiException {
	
	public function __construct(Resource $resource) {
		parent::__construct("Resource has not been saved");
	}
	
}