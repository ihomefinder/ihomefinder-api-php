<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class Subscriber extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getClientId() {
		return $this->getter("clientId");
	}
	
	public function setClientId($clientId): self {
		$this->setter("clientId", $clientId);
		return $this;
	}
	
	public function getAgentId() {
		return $this->getter("agentId");
	}
	
	public function setAgentId($agentId): self {
		$this->setter("agentId", $agentId);
		return $this;
	}
	
	public function getFirstName() {
		return $this->getter("firstName");
	}
	
	public function setFirstName($firstName): self {
		$this->setter("firstName", $firstName);
		return $this;
	}
	
	public function getLastName() {
		return $this->getter("lastName");
	}
	
	public function setLastName($lastName): self {
		$this->setter("lastName", $lastName);
		return $this;
	}
	
	public function getEmailAddress() {
		return $this->getter("emailAddress");
	}
	
	public function setEmailAddress($emailAddress): self {
		$this->setter("emailAddress", $emailAddress);
		return $this;
	}
	
	private function getPassword() {
		return $this->getter("password");
	}
	
	public function setPassword($password): self {
		$this->setter("password", $password);
		return $this;
	}
	
	public function getPhone() {
		return $this->getter("phone");
	}
	
	public function setPhone($phone): self {
		$this->setter("phone", $phone);
		return $this;
	}
	
	public function getAddress() {
		return $this->getter("address");
	}
	
	public function setAddress($address): self {
		$this->setter("address", $address);
		return $this;
	}
	
	public function getCity() {
		return $this->getter("city");
	}
	
	public function setCity($city): self {
		$this->setter("city", $city);
		return $this;
	}
	
	public function getState() {
		return $this->getter("state");
	}
	
	public function setState($state): self {
		$this->setter("state", $state);
		return $this;
	}
	
	public function getPostalCode() {
		return $this->getter("postalCode");
	}
	
	public function setPostalCode($postalCode): self {
		$this->setter("postalCode", $postalCode);
		return $this;
	}
	
	public function getClient(): Client {
		$this->getter("client", Client::class);
	}
	
	public function setClient(Client $client): self {
		$this->setter("client", $client);
		return $this;
	}
	
	public function getAgent() {
		$this->getter("agent", Agent::class);
	}
	
	public function setAgent(Agent $agent): self {
		if(ResourceWrapper::getInstance($agent)->isTransient()) {
			throw new UnsavedResourceException($agent);
		}
		$this->setAgentId($agent->getId());
		$this->setter("agent", $agent);
		return $this;
	}
	
	protected function getFieldNames(): array {
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
			"postalCode",
		];
	}
	
}