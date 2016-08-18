<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Request;
use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceManager;
use iHomefinder\Api\Constants;
use iHomefinder\Api\Exception\ApiException;

class ClientSession extends Resource {
	
	protected $active = true;
	
	public function __destruct() {
		if($this->active) {
			throw new ApiException("Session has not been logged out");
		}
	}
	
	public static function login(string $username, string $password): self {
		$object = (new Request())
			->setUrl(Constants::LOGIN_URL)
			->setMethod("POST")
			->setParameter("username", $username)
			->setParameter("password", $password)
			->getResponse()
			->getData()
		;
		$session = ResourceManager::getInstance()->load(ClientSession::class, $object);
		return $session;
	}
	
	public function getClientId(): int {
		return $this->getter("clientId");
	}
	
	public function setClientId(int $clientId): self {
		$this->setter("clientId", $clientId);
		return $this;
	}
	
	public function getClient(): Client {
		return $this->getter("client", Client::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"clientId",
		];
	}
	
	public function logout() {
		ResourceManager::getInstance()->save();
		$this->active = false;
	}
	
}