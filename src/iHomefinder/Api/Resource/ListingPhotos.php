<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Authentication;

class ListingPhotos extends Resources {
	
	public function __construct(Authentication $auth) {
		super($auth);
	}
	
	protected function getElementClass(): string {
		return ListingPhoto::class;
	}
	
}