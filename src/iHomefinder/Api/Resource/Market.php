<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;

class Market extends Resource {
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", "int");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getClientId() {
		return $this->getter("clientId", "int");
	}
	
	public function setClientId($clientId): self {
		$this->setter("clientId", $clientId);
		return $this;
	}
	
	public function getName() {
		return $this->getter("name", "string");
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getDescription() {
		return $this->getter("description", "string");
	}
	
	public function setDescription($description): self {
		$this->setter("description", $description);
		return $this;
	}
	
	public function getDisplayOnIndex() {
		return $this->getter("displayOnIndex", Boolean::class);
	}
	
	public function setDisplayOnIndex($displayOnIndex): self {
		$this->setter("displayOnIndex", $displayOnIndex);
		return $this;
	}
	
	public function getIndexDisplayOrder() {
		return $this->getter("indexDisplayOrder", "int");
	}
	
	public function setIndexDisplayOrder($indexDisplayOrder): self {
		$this->setter("indexDisplayOrder", $indexDisplayOrder);
		return $this;
	}
	
	public function getListingReport(): ListingReport {
		return $this->getter("listingReport", ListingReport::class);
	}
	
	public function getOpenHomeReport(): OpenHomeReport {
		return $this->getter("openHomeReport", OpenHomeReport::class);
	}
	
	public function getMarketReport(): MarketReport {
		return $this->getter("marketReport", MarketReport::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"clientId",
			"name",
			"description",
			"displayOnIndex",
			"indexDisplayOrder"
		];
	}
	
}