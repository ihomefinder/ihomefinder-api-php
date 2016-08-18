<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class MarketReportSignupRequest extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId");
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
		return $this;
	}
	
	public function getMarketReportId() {
		return $this->getter("marketReportId");
	}
	
	public function setMarketReportId($marketReportId): self {
		$this->setter("marketReportId", $marketReportId);
		return $this;
	}
	
	public function getCreatedOn() {
		return $this->getter("createdOn");
	}
	
	public function setCreatedOn($createdOn): self {
		$this->setter("createdOn", $createdOn);
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
	
	public function getMarketReport() {
		return $this->getter("marketReport", MarketReport::class);
	}
	
	public function setMarketReport(MarketReport $marketReport): self {
		if(ResourceWrapper::getInstance($marketReport)->isTransient()) {
			throw new UnsavedResourceException($marketReport);
		}
		$this->setListingId($marketReport->getId());
		$this->setter("marketReport", $marketReport);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"subscriberId",
			"marketReportId",
			"createdOn",
			"message",
		];
	}
	
}