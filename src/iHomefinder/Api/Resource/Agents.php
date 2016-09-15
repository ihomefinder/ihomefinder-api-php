<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resources;
use \iHomefinder\Api\Url;

class Agents extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$agents = new Agents($auth);
		$agents->init(Url::AGENTS, $query);
		return $agents;
	}
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}
	
	protected function getElementClass(): string {
		return Agent::class;
	}
	
}