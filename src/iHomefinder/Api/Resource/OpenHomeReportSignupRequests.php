<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class OpenHomeReportSignupRequests extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$openHomeReportSignupRequests = new OpenHomeReportSignupRequests($auth);
		$openHomeReportSignupRequests->init(Url::OPEN_HOME_REPORT_SIGNUP_REQUESTS, $query);
		return $openHomeReportSignupRequests;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return OpenHomeReportSignupRequest::class;
	}
	
}