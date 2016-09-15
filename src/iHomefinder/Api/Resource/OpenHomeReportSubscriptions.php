<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Resources;

class OpenHomeReportSubscriptions extends Resources {

	public function OpenHomeReportSubscriptions(Authentication $auth) {
		parent::__construct($auth);
	}
	
}