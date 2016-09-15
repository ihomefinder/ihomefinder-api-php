<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;

class ListingReport extends Resource {
	
	public function ListingReport(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getMarketId() {
		return $this->getter("marketId", Integer::class);
	}
	
	public function setMarketId($marketId): self {
		$this->setter("marketId", $marketId);
		return $this;
	}
	
	public function getWebPageIntroText() {
		return $this->getter("webPageIntroText", String::class);
	}
	
	public function setWebPageIntroText($webPageIntroText): self {
		$this->setter("webPageIntroText", $webPageIntroText);
		return $this;
	}
	
	public function getEmailIntroText() {
		return $this->getter("emailIntroText", String::class);
	}
	
	public function setEmailIntroText($emailIntroText): self {
		$this->setter("emailIntroText", $emailIntroText);
		return $this;
	}
	
	public function getDisplayInNavigation() {
		return $this->getter("displayInNavigation", Boolean::class);
	}
	
	public function setDisplayInNavigation($displayInNavigation): self {
		$this->setter("displayInNavigation", $displayInNavigation);
		return $this;
	}
	
	public function  getMarket(): Market {
		return $this->getter("market", Market::class);
	}
	
	public function  getListingReportSubscriptions(): ListingReportSubscriptions {
		return $this->getter("listingReportSubscriptions", ListingReportSubscriptions::class);
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"marketId",
			"webPageIntroText",
			"emailIntroText",
			"displayInNavigation"
		];
	}
	
}