<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\Exception\UnsavedResourceException;
use iHomefinder\Api\ResourceWrapper;

class ReportSubscription extends Resource {
	
	public function getMarketId() {
		return $this->getter("marketId");
	}
	
	public function setMarketId($marketId): self {
		$this->setter("marketId", $marketId);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId");
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
		return $this;
	}
	
	public function getListingReportEnabled() {
		return $this->getter("listingReportEnabled");
	}
	
	public function setListingReportEnabled($listingReportEnabled): self {
		$this->setter("listingReportEnabled", $listingReportEnabled);
		return $this;
	}
	
	public function getOpenHomeReportEnabled() {
		return $this->getter("openHomeReportEnabled");
	}
	
	public function setOpenHomeReportEnabled($openHomeReportEnabled): self {
		$this->setter("openHomeReportEnabled", $openHomeReportEnabled);
		return $this;
	}
	
	public function getMarketReportEnabled() {
		return $this->getter("marketReportEnabled");
	}
	
	public function setMarketReportEnabled($marketReportEnabled): self {
		$this->setter("marketReportEnabled", $marketReportEnabled);
		return $this;
	}
	
	public function getMarket() {
		return $this->getter("market", Market::class);
	}
	
	public function setMarket(Market $market): self {
		if(ResourceWrapper::getInstance($market)->isTransient()) {
			throw new UnsavedResourceException($market);
		}
		$this->setMarketId($market->getId());
		$this->setter("market", $market);
		return $this;
	}
	
	public function getSubscriber() {
		return $this->getter("subscriber", Subscriber::class);
	}
	
	public function setSubscriber(Subscriber $subscriber): self {
		if(ResourceWrapper::getInstance($subscriber)->isTransient()) {
			throw new UnsavedResourceException($subscriber);
		}
		$this->setSubscriberId($subscriber->getId());
		$this->setter("subscriber", $subscriber);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"marketId",
			"subscriberId",
			"listingReportEnabled",
			"openHomeReportEnabled",
			"marketReportEnabled",
		];
	}
	
}