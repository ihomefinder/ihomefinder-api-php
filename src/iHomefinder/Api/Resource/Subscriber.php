<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Query;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Savable;
use \iHomefinder\Api\Url;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class Subscriber extends Resource implements Savable {
	
	public static function getById(Authentication $auth, Integer $id): Subscriber {
		$query = (new Query())
			->where("id", $id)
		;
		return Subscribers::get($auth, $query)->iterator()->next();
	}
	
	public function Subscriber(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getClientId() {
		return $this->getter("clientId", Integer::class);
	}
	
	public function setClientId($clientId): self {
		$this->setter("clientId", $clientId);
		return $this;
	}
	
	public function getAgentId() {
		return $this->getter("agentId", Integer::class);
	}
	
	public function setAgentId($agentId): self {
		$this->setter("agentId", $agentId);
		return $this;
	}
	
	public function getFirstName() {
		return $this->getter("firstName", String::class);
	}
	
	public function setFirstName($firstName): self {
		$this->setter("firstName", $firstName);
		return $this;
	}
	
	public function getLastName() {
		return $this->getter("lastName", String::class);
	}
	
	public function setLastName($lastName): self {
		$this->setter("lastName", $lastName);
		return $this;
	}
	
	public function getEmailAddress() {
		return $this->getter("emailAddress", String::class);
	}
	
	public function setEmailAddress($emailAddress): self {
		$this->setter("emailAddress", $emailAddress);
		return $this;
	}
	
	public function getPassword() {
		return $this->getter("password", String::class);
	}
	
	public function setPassword($password): self {
		$this->setter("password", $password);
		return $this;
	}
	
	public function getPhone() {
		return $this->getter("phone", String::class);
	}
	
	public function setPhone($phone): self {
		$this->setter("phone", $phone);
		return $this;
	}
	
	public function getAddress() {
		return $this->getter("address", String::class);
	}
	
	public function setAddress($address): self {
		$this->setter("address", $address);
		return $this;
	}
	
	public function getCity() {
		return $this->getter("city", String::class);
	}
	
	public function setCity($city): self {
		$this->setter("city", $city);
		return $this;
	}
	
	public function getState() {
		return $this->getter("state", String::class);
	}
	
	public function setState($state): self {
		$this->setter("state", $state);
		return $this;
	}
	
	public function getPostalCode() {
		return $this->getter("postalCode", String::class);
	}
	
	public function setPostalCode($postalCode): self {
		$this->setter("postalCode", $postalCode);
		return $this;
	}
	
	public function getClient(): Client {
		return $this->getter("client", Client::class);
	}
	
	public function setClient(Client $client): self {
		$this->setter("client", $client);
		return $this;
	}
	
	public function getAgent(): Agent {
		return $this->getter("agent", Agent::class);
	}
	
	public function setAgent(Agent $agent): self {
		if($agent->isTransient()) {
			throw new UnsavedResourceException($agent);
		}
		$this->setAgentId($agent->getId());
		$this->setter("agent", $agent);
		return $this;
	}
	
	public function save(): self {
		saveHelper(Url::SUBSCRIBERS);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"clientId",
			"agentId",
			"firstName",
			"lastName",
			"emailAddress",
			"password",
			"phone",
			"address",
			"city",
			"state",
			"postalCode"
		];
	}
	
}