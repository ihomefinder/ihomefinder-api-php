<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;

class Market extends Resource {
	
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
	
	public function getName() {
		return $this->getter("name");
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getDescription() {
		return $this->getter("description");
	}
	
	public function setDescription($description): self {
		$this->setter("description", $description);
		return $this;
	}
	
	public function getDisplayOnIndex() {
		return $this->getter("displayOnIndex");
	}
	
	public function setDisplayOnIndex($displayOnIndex): self {
		$this->setter("displayOnIndex", $displayOnIndex);
		return $this;
	}
	
	public function getIndexDisplayOrder() {
		return $this->getter("indexDisplayOrder");
	}
	
	public function setIndexDisplayOrder($indexDisplayOrder): self {
		$this->setter("indexDisplayOrder", $indexDisplayOrder);
		return $this;
	}
	
	public function getListingReport() {
		return $this->getter("listingReport", ListingReport::class);
	}
	
	public function getOpenHomeReport() {
		return $this->getter("openHomeReport", OpenHomeReport::class);
	}
	
	public function getMarketReport() {
		return $this->getter("marketReport", MarketReport::class);
	}
	
	public function getReportSubscriptions() {
		return $this->getter("reportSubscriptions", ReportSubscriptions::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"clientId",
			"name",
			"description",
			"displayOnIndex",
			"indexDisplayOrder",
		];
	}
	
}