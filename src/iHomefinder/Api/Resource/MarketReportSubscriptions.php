<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Resources;

class MarketReportSubscriptions extends Resources {

	public function MarketReportSubscriptions(Authentication $auth) {
		parent::__construct($auth);
	}
	
}