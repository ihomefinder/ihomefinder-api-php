<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Resources;

class OpenHomeReportSubscriptions extends Resources {

	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return OpenHomeReportSubscription::class;
	}
	
}