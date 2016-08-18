<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;

class Office extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getName() {
		return $this->getter("name"); 
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getPhoneNumber() {
		return $this->getter("phoneNumber");
	}
	
	public function setPhoneNumber($phoneNumber): self {
		$this->setter("phoneNumber, $phoneNumber");
		return $this;
	}
	
	public function getFaxNumber() {
		return $this->getter("faxNumber");
	}
	
	public function setFaxNumber($faxNumber): self {
		$this->setter("faxNumber, $faxNumber");
		return $this;
	}
	
	public function getEmailAddress() {
		return $this->getter("emailAddress");
	}
	
	public function setEmailAddress($emailAddress): self {
		$this->setter("emailAddress", $emailAddress);
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
	
	public function getAgents(): Agents {
		return $this->getter("agents", Agents::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"name",
			"emailAddress",
			"address",
			"city",
			"state",
			"postalCode",
		];
	}
	
}