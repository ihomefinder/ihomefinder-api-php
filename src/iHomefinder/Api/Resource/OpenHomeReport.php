<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;

class OpenHomeReport extends Resource {
	
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
	
	public function getMarketId() {
		return $this->getter("marketId", "int");
	}
	
	public function setMarketId($marketId): self {
		$this->setter("marketId", $marketId);
		return $this;
	}
	
	public function getWebPageIntroText() {
		return $this->getter("webPageIntroText", "string");
	}
	
	public function setWebPageIntroText($webPageIntroText): self {
		$this->setter("webPageIntroText", $webPageIntroText);
		return $this;
	}
	
	public function getEmailIntroText() {
		return $this->getter("emailIntroText", "string");
	}
	
	public function setEmailIntroText($emailIntroText): self {
		$this->setter("emailIntroText", $emailIntroText);
		return $this;
	}
	
	public function getDisplayInNavigation() {
		return $this->getter("displayInNavigation", "bool");
	}
	
	public function setDisplayInNavigation($displayInNavigation): self {
		$this->setter("displayInNavigation", $displayInNavigation);
		return $this;
	}
	
	public function getLimitEmailToFeaturedListings() {
		return $this->getter("limitEmailToFeaturedListings", "bool");
	}
	
	public function setLimitEmailToFeaturedListings($limitEmailToFeaturedListings): self {
		$this->setter("limitEmailToFeaturedListings", $limitEmailToFeaturedListings);
		return $this;
	}
	
	public function getMarket(): Market {
		return $this->getter("market", Market::class);
	}
	
	public function getOpenHomeReportSubscriptions(): OpenHomeReportSubscriptions {
		return $this->getter("openHomeReportSubscriptions", OpenHomeReportSubscriptions::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"marketId",
			"webPageIntroText",
			"emailIntroText",
			"displayInNavigation",
			"limitEmailToFeaturedListings"
		];
	}
	
}