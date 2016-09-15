<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class MoreInfoRequests extends Resources {
	
	public static function get(Authentication $auth, Query $query): self {
		$moreInfoRequests = new MoreInfoRequests($auth);
		$moreInfoRequests->init(Url::MORE_INFO_REQUESTS, $query);
		return $moreInfoRequests;
	}
	
	public function MoreInfoRequests(Authentication $auth) {
		parent::__construct($auth);
	}
	
}