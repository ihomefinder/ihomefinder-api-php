<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Markets extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$markets = new Markets($auth);
		$markets->init(Url::MARKETS, $query);
		return $markets;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return Market::class;
	}
	
}