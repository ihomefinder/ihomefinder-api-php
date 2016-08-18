<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class ListingReportSignupRequest extends Resource {
	
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
	
	public function getListingReportId() {
		return $this->getter("listingReportId");
	}
	
	public function setListingReportId($listingReportId): self {
		$this->setter("listingReportId", $listingReportId);
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
	
	public function getListingReport() {
		return $this->getter("listingReport", ListingReport::class);
	}
	
	public function setListingReport(ListingReport $listingReport): self {
		if(ResourceWrapper::getInstance($listingReport)->isTransient()) {
			throw new UnsavedResourceException($listingReport);
		}
		$this->setListingId($listingReport->getId());
		$this->setter("listingReport", $listingReport);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"subscriberId",
			"listingReportId",
			"createdOn",
			"message",
		];
	}
	
}