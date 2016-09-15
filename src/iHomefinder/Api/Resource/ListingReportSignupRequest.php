<?php

namespace iHomefinder\Api\Resource;



use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class ListingReportSignupRequest extends Resource {
	
	public function ListingReportSignupRequest(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId", Integer::class);
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
		return $this;
	}
	
	public function getListingReportId() {
		return $this->getter("listingReportId", Integer::class);
	}
	
	public function setListingReportId($listingReportId): self {
		$this->setter("listingReportId", $listingReportId);
		return $this;
	}
	
	public function getCreatedOn(): DateTime {
		return $this->getter("createdOn", DateTime::class);
	}
	
	public function setCreatedOn(DateTime $createdOn): self {
		$this->setter("createdOn", $createdOn);
		return $this;
	}
	
	public function getSubscriber(): Subscriber {
		return $this->getter("subscriber", Subscriber::class);
	}
	
	public function setSubscriber(Subscriber $subscriber): self {
		if($subscriber->isTransient()) {
			throw new UnsavedResourceException($subscriber);
		}
		$this->setSubscriberId($subscriber->getId());
		$this->setter("subscriber", $subscriber);
		return $this;
	}
	
	public function getListingReport(): ListingReport {
		return $this->getter("listingReport", ListingReport::class);
	}
	
	public function setListingReport(ListingReport $listingReport): self {
		if($listingReport->isTransient()) {
			throw new UnsavedResourceException($listingReport);
		}
		$this->setListingReportId($listingReport->getId());
		$this->setter("listingReport", $listingReport);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"subscriberId",
			"listingReportId",
			"createdOn"
		];
	}
	
}