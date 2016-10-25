<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Authentication;

class ListingPhoto extends Resource {
	
	public function __construct(Authentication $auth) {
		super($auth);
	}

	public function getId() {
		return $this->getter("id", "string");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getListingId() {
		return $this->getter("listingId", "string");
	}
	
	public function setListingId($listingId): self {
		$this->setter("listingId", $listingId);
		return $this;
	}
	
	public function getLargeImageUrl() {
		return $this->getter("largeImageUrl", "string");
	}
	
	public function setLargeImageUrl($largeImageUrl): self {
		$this->setter("largeImageUrl", $largeImageUrl);
		return $this;
	}
	
	public function getSmallImageUrl() {
		return $this->getter("smallImageUrl", "string");
	}
	
	public function setSmallImageUrl($smallImageUrl): self {
		$this->setter("smallImageUrl", $smallImageUrl);
		return $this;
	}
	
	public function getDisplayOrder() {
		return $this->getter("displayOrder", "int");
	}
	
	public function setDisplayOrder(Integer $displayOrder): self {
		$this->setter("displayOrder", $displayOrder);
		return $this;
	}
	
	public function getListing(): Listing {
		return $this->getter("listing", Listing::class);
	}
	
	public function setListing(Listing $listing): self {
		if($listing->isTransient()) {
			throw new UnsavedResourceException($listing);
		}
		$this->setListingId($listing->getId());
		$this->setter("listing", $listing);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"listingId",
			"largeImageUrl",
			"smallImageUrl",
			"displayOrder"
		];
	}
	
}