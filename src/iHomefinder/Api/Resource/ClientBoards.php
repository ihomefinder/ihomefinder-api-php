<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Url;
use iHomefinder\Api\Authentication;

class ClientBoards extends Resources {

	public static function get(Authentication $auth, Query $query): self {
		$clientBoards = new ClientBoards($auth);
		$clientBoards->init(Url::CLIENT_BOARDS, $query);
		return $clientBoards;
	}
	
	public function __construct(Authentication $auth) {
		super($auth);
	}
	
	protected function getElementClass(): string {
		return ClientBoard::class;
	}
	
}