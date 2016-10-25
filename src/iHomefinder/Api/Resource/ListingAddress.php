<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Authentication;

class ListingAddress extends Resource {
	
	public function __construct(Authentication $auth) {
		super($auth);
	}
	
	public function getInternalDisplay() {
		return $this->getter("internalDisplay", "string"); 
	}
	
	public function setInternalDisplay($internalDisplay) {
		$this->setter("internalDisplay", $internalDisplay);
		return $this;
	}
	
	public function getExternalDisplay() {
		return $this->getter("externalDisplay", "string"); 
	}
	
	public function setExternalDisplay($externalDisplay) {
		$this->setter("externalDisplay", $externalDisplay);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"internalDisplay",
			"externalDisplay"
		];
	}
	
}