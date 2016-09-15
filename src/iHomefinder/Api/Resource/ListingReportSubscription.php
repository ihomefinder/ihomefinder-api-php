<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Savable;
use \iHomefinder\Api\Url;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class ListingReportSubscription extends Resource implements Savable {
	
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
	
	public function getListingReportId() {
		return $this->getter("listingReportId", "int");
	}
	
	public function setListingReportId($listingReportId): self {
		$this->setter("listingReportId", $listingReportId);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId", "int");
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
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
	
	public function save(): self {
		saveHelper(Url::LISTING_REPORT_SUBSCRIPTIONS);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"listingReportId",
			"subscriberId"
		];
	}
	
}