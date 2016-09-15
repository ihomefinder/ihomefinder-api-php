<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Subscribers extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$subscribers = new Subscribers($auth);
		$subscribers->init(Url::SUBSCRIBERS, $query);
		return $subscribers;
	}
	
	public function Subscribers(Authentication $auth) {
		parent::__construct($auth);
	}
	
}