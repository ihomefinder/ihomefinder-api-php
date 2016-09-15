<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Boards extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$boards = new Boards($auth);
		$boards->init(Url::BOARDS, $query);
		return $boards;
	}
	
	public function Boards(Authentication $auth) {
		parent::__construct($auth);
	}
	
}