<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class ContactRequests extends Resources {

	public static function  get(Authentication $auth, Query $query): self {
		$contactRequests = new ContactRequests($auth);
		$contactRequests->init(Url::CONTACT_REQUESTS, $query);
		return $contactRequests;
	}
	
	public function ContactRequests(Authentication $auth) {
		parent::__construct($auth);
	}
	
}