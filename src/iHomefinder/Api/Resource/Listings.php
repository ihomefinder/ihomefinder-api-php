<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resources;

class Listings extends Resources {
	
	protected function getElementClass(): string {
		return Listing::class;
	}
	
}