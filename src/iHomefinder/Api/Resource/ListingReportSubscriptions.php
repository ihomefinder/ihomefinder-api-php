<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Resources;

class ListingReportSubscriptions extends Resources {

	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return ListingReportSubscription::class;
	}
	
}