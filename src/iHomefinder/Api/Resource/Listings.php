<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Listings extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$listings = new Listings($auth);
		$listings->init(Url::LISTINGS, $query);
		return $listings;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return Listing::class;
	}

}