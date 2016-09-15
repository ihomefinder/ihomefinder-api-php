<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Offices extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$offices = new Offices($auth);
		$offices->init(Url::OFFICES, $query);
		return $offices;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return Office::class;
	}
	
}