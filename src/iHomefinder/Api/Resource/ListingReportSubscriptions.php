<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Resources;

class ListingReportSubscriptions extends Resources {

	public function ListingReportSubscriptions(Authentication $auth) {
		parent::__construct($auth);
	}
	
}