<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Exception\UnsavedResourceException;
use \iHomefinder\Api\Resource;

class Agent extends Resource {
	public function __construct(Authentication $auth) {
		parent::__construct ( $auth );
	}
	public function getId() {
		return $this->getter ( "id", "int" );
	}
	public function setId($id): self {
		$this->setter ( "id", $id );
		return $this;
	}
	public function getOfficeId() {
		return $this->getter ( "officeId", "int" );
	}
	public function setOfficeId($officeId): self {
		$this->setter ( "officeId", $officeId );
		return $this;
	}
	public function getFirstName() {
		return $this->getter ( "firstName", "string" );
	}
	public function setFirstName($firstName): self {
		$this->setter ( "firstName", $firstName );
		return $this;
	}
	public function getLastName() {
		return $this->getter ( "lastName", "string" );
	}
	public function setLastName($lastName): self {
		$this->setter ( "lastName", $lastName );
		return $this;
	}
	public function getEmailAddress() {
		return $this->getter ( "emailAddress", "string" );
	}
	public function setEmailAddress($emailAddress): self {
		$this->setter ( "emailAddress", $emailAddress );
		return $this;
	}
	public function getAddress() {
		return $this->getter ( "address", "string" );
	}
	public function setAddress($address): self {
		$this->setter ( "address", $address );
		return $this;
	}
	public function getCity() {
		return $this->getter ( "city", "string" );
	}
	public function setCity($city): self {
		$this->setter ( "city", $city );
		return $this;
	}
	public function getState() {
		return $this->getter ( "state", "string" );
	}
	public function setState($state): self {
		$this->setter ( "state", $state );
		return $this;
	}
	public function getPostalCode() {
		return $this->getter ( "postalCode", "string" );
	}
	public function setPostalCode($postalCode): self {
		$this->setter ( "postalCode", $postalCode );
		return $this;
	}
	public function getOffice(): Office {
		return $this->getter ( "office", Office::class );
	}
	public function setOffice(Office $office): self {
		if ($office->isTransient ()) {
			throw new UnsavedResourceException ( $office );
		}
		$this->setOfficeId ( $office->getId () );
		$this->setter ( "office", $office );
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
				"postalCode" 
		];
	}
}