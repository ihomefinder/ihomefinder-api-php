<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class ListingReportSignupRequests extends Resources {

	public static function  get(Authentication $auth, Query $query): self {
		$listingReportSignupRequests = new ListingReportSignupRequests($auth);
		$listingReportSignupRequests->init(Url::LISTING_REPORT_SIGNUP_REQUESTS, $query);
		return $listingReportSignupRequests;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return ListingReportSignupRequest::class;
	}
	
}