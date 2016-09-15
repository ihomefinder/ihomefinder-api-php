<?php

namespace iHomefinder\Api\Resource;



use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class MarketReportSignupRequest extends Resource {
	
	public function MarketReportSignupRequest(Authentication $auth) {
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
	
	public function getMarketReportId() {
		return $this->getter("marketReportId", Integer::class);
	}
	
	public function setMarketReportId($marketReportId): self {
		$this->setter("marketReportId", $marketReportId);
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
	
	public function getMarketReport(): MarketReport {
		return $this->getter("marketReport", MarketReport::class);
	}
	
	public function setMarketReport(MarketReport $marketReport): self {
		if($marketReport->isTransient()) {
			throw new UnsavedResourceException($marketReport);
		}
		$this->setMarketReportId($marketReport->getId());
		$this->setter("marketReport", $marketReport);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"subscriberId",
			"marketReportId",
			"createdOn"
		];
	}
	
}