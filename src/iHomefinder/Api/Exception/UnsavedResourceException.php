<?php

namespace iHomefinder\Api\Exception;

use \iHomefinder\Api\Resource;

class UnsavedResourceException extends ApiException {

	public function UnsavedResourceException(Resource $resource) {
		parent::_construct("Resource has not been saved");
	}
	
}