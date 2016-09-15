<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class ValuationRequests extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$valuationRequests = new ValuationRequests($auth);
		$valuationRequests->init(Url::VALUATION_REQUESTS, $query);
		return $valuationRequests;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return ValuationRequest::class;
	}
	
}