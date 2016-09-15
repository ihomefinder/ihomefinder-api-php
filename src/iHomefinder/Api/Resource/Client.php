<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;

class Client extends Resource {
	
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
	
	public function getFirstName() {
		return $this->getter("firstName", "string");
	}
	
	public function setFirstName($firstName): self {
		$this->setter("firstName", $firstName);
		return $this;
	}
	
	public function getLastName() {
		return $this->getter("lastName", "string");
	}
	
	public function setLastName($lastName): self {
		$this->setter("lastName", $lastName);
		return $this;
	}
	
	public function  getBoards(): Boards {
		return $this->getter("boards", Boards::class);
	}
	
	public function  getListings(): Listings {
		return $this->getter("listings", Listings::class);
	}
	
	public function  getSubscribers(): Subscribers {
		return $this->getter("subscribers", Subscribers::class);
	}
	
	public function  getMarkets(): Markets {
		return $this->getter("markets", Markets::class);
	}
	
	public function  getAgents(): Agents {
		return $this->getter("agents", Agents::class);
	}
	
	public function  getOffices(): Offices {
		return $this->getter("offices", Offices::class);
	}
	
	public function  getMoreInfoRequests(): MoreInfoRequests {
		return $this->getter("moreInfoRequests", MoreInfoRequests::class);
	}
	
	public function  getScheduleShowingRequests(): ScheduleShowingRequests {
		return $this->getter("scheduleShowingRequests", ScheduleShowingRequests::class);
	}
	
	public function  getValuationRequests(): ValuationRequests {
		return $this->getter("valuationRequests", ValuationRequests::class);
	}
	
	public function  getContactRequests(): ContactRequests {
		return $this->getter("contactRequests", ContactRequests::class);
	}
	
	public function  getListingReportSignupRequests(): ListingReportSignupRequests {
		return $this->getter("listingReportSignupRequests", ListingReportSignupRequests::class);
	}
	
	public function  getOpenHomeReportSignupRequests(): OpenHomeReportSignupRequests {
		return $this->getter("openHomeReportSignupRequests", OpenHomeReportSignupRequests::class);
	}
	
	public function  getMarketReportSignupRequests(): MarketReportSignupRequests {
		return $this->getter("marketReportSignupRequests", MarketReportSignupRequests::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"firstName",
			"lastName"
		];
	}
	
}