<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class Agent extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getOfficeId() {
		return $this->getter("officeId");
	}
	
	public function setOfficeId($officeId): self {
		$this->setter("officeId", $officeId);
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
	
	public function getDesignation() {
		return $this->getter("designation");
	}
	
	public function setDesignation($designation): self {
		$this->setter("designation, $designation");
		return $this;
	}
	
	public function getMobilePhoneNumber() {
		return $this->getter("mobilePhoneNumber");
	}
	
	public function setMobilePhoneNumber($mobilePhoneNumber): self {
		$this->setter("mobilePhoneNumber, $mobilePhoneNumber");
		return $this;
	}
	
	public function getHomePhoneNumber() {
		return $this->getter("homePhoneNumber");
	}
	
	public function setHomePhoneNumber($homePhoneNumber): self {
		$this->setter("homePhoneNumber, $homePhoneNumber");
		return $this;
	}
	
	public function getHomeFaxNumber() {
		return $this->getter("homeFaxNumber");
	}
	
	public function setHomeFaxNumber($homeFaxNumber): self {
		$this->setter("homeFaxNumber, $homeFaxNumber");
		return $this;
	}
	
	public function getOfficePhoneNumber() {
		return $this->getter("officePhoneNumber");
	}
	
	public function setOfficePhoneNumber($officePhoneNumber): self {
		$this->setter("officePhoneNumber, $officePhoneNumber");
		return $this;
	}
	
	public function getOfficeFaxNumber() {
		return $this->getter("officeFaxNumber");
	}
	
	public function setOfficeFaxNumber($officeFaxNumber): self {
		$this->setter("officeFaxNumber, $officeFaxNumber");
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
	
	public function getOffice() {
		return $this->getter("office", Office::class);
	}
	
	public function setOffice(Office $office): self {
		if(ResourceWrapper::getInstance($office)->isTransient()) {
			throw new UnsavedResourceException($office);
		}
		$this->setOfficeId($office->getId());
		$this->setter("office", $office);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"officeId",
			"firstName",
			"lastName",
			"emailAddress",
			"address",
			"city",
			"state",
			"postalCode",
		];
	}
	
}