<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;

class ListingReport extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getMarketId() {
		return $this->getter("marketId");
	}
	
	public function setMarketId($marketId): self {
		$this->setter("marketId", $marketId);
		return $this;
	}
	
	public function getWebPageIntroText() {
		return $this->getter("webPageIntroText");
	}
	
	public function setWebPageIntroText($webPageIntroText): self {
		$this->setter("webPageIntroText", $webPageIntroText);
		return $this;
	}
	
	public function getEmailIntroText() {
		return $this->getter("emailIntroText");
	}
	
	public function setEmailIntroText($emailIntroText): self {
		$this->setter("emailIntroText", $emailIntroText);
		return $this;
	}
	
	public function getDisplayInNavigation() {
		return $this->getter("displayInNavigation");
	}
	
	public function setDisplayInNavigation($displayInNavigation): self {
		$this->setter("displayInNavigation", $displayInNavigation);
		return $this;
	}
	
	public function getMarket(): Market {
		$this->getter("market", Market::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"marketId",
			"webPageIntroText",
			"emailIntroText",
			"displayInNavigation",
		];
	}
	
}