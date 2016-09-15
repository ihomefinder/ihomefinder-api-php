<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Savable;
use \iHomefinder\Api\Url;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class MarketReportSubscription extends Resource implements Savable {
	
	public function MarketReportSubscription(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getMarketReportId() {
		return $this->getter("marketReportId", Integer::class);
	}
	
	public function setMarketReportId($marketReportId): self {
		$this->setter("marketReportId", $marketReportId);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId", Integer::class);
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
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
		saveHelper(Url::MARKET_REPORT_SUBSCRIPTIONS);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"marketReportId",
			"subscriberId"
		];
	}
	
}