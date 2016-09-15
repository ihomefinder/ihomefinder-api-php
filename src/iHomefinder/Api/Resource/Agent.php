<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class Agent extends Resource {
	
	public function Agent(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getOfficeId() {
		return $this->getter("officeId", Integer::class);
	}
	
	public function setOfficeId($officeId): self {
		$this->setter("officeId", $officeId);
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
	
	public function getOffice(): Office {
		return $this->getter("office", Office::class);
	}
	
	public function setOffice(Office $office): self {
		if($office->isTransient()) {
			throw new UnsavedResourceException($office);
		}
		$this->setOfficeId($office->getId());
		$this->setter("office", $office);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"officeId",
			"firstName",
			"lastName",
			"emailAddress",
			"address",
			"city",
			"state",
			"postalCode"
		];
	}
	
}