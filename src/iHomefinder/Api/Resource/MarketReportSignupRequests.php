<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class MarketReportSignupRequests extends Resources {

	public static function  get(Authentication $auth, Query $query): self {
		$marketReportSignupRequests = new MarketReportSignupRequests($auth);
		$marketReportSignupRequests->init(Url::MARKET_REPORT_SIGNUP_REQUESTS, $query);
		return $marketReportSignupRequests;
	}
	
	public function MarketReportSignupRequests(Authentication $auth) {
		parent::__construct($auth);
	}
	
}