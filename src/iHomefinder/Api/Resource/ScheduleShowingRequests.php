<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class ScheduleShowingRequests extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$scheduleShowingRequests = new ScheduleShowingRequests($auth);
		$scheduleShowingRequests->init(Url::SCHEDULE_SHOWING_REQUESTS, $query);
		return scheduleShowingRequests;
	}
	
	public function ScheduleShowingRequests(Authentication $auth) {
		parent::__construct($auth);
	}
		
}