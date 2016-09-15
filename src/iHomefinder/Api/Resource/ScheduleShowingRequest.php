<?php

namespace iHomefinder\Api\Resource;



use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class ScheduleShowingRequest extends Resource {
	
	public function ScheduleShowingRequest(Authentication $auth) {
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
	
	public function getListingId() {
		return $this->getter("listingId", String::class);
	}
	
	public function setListingId($listingId): self {
		$this->setter("listingId", $listingId);
		return $this;
	}
	
	public function getCreatedOn(): DateTime {
		return $this->getter("createdOn", DateTime::class);
	}
	
	public function setCreatedOn(DateTime $createdOn): self {
		$this->setter("createdOn", $createdOn);
		return $this;
	}
	
	public function getPreferableOn(): DateTime {
		return $this->getter("preferableOn", DateTime::class);
	}
	
	public function setPreferableOn(DateTime $preferableOn): self {
		$this->setter("preferableOn", $preferableOn);
		return $this;
	}
	
	public function getAlternativeOn(): DateTime {
		return $this->getter("alternativeOn", DateTime::class);
	}
	
	public function setAlternativeOn(DateTime $alternativeOn): self {
		$this->setter("alternativeOn", $alternativeOn);
		return $this;
	}
	
	public function getMessage() {
		return $this->getter("message", String::class);
	}
	
	public function setMessage($message): self {
		$this->setter("message", $message);
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
	
	public function getListing(): Listing {
		return $this->getter("listing", Listing::class);
	}
	
	public function setListing(Listing $listing): self {
		if($listing->isTransient()) {
			throw new UnsavedResourceException(listing);
		}
		$this->setListingId($listing->getId());
		$this->setter("listing", $listing);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"subscriberId",
			"listingId",
			"createdOn",
			"preferableOn",
			"alternativeOn",
			"message"
		];
	}
	
}