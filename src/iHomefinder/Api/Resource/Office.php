<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;

class Office extends Resource {
	
	public function Office(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getName() {
		return $this->getter("name", String::class); 
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getEmailAddress() {
		return $this->getter("emailAddress", String::class);
	}
	
	public function setEmailAddress($emailAddress): self {
		$this->setter("emailAddress", $emailAddress);
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
	
	public function  getAgents(): Agents {
		return $this->getter("agents", Agents::class);
	}
		protected function getFieldNames(): Fields {
		return [
			"id",
			"name",
			"emailAddress",
			"address",
			"city",
			"state",
			"postalCode"
		];
	}
	
}