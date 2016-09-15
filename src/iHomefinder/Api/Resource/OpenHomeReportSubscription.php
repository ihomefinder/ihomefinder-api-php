<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Savable;
use \iHomefinder\Api\Url;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class OpenHomeReportSubscription extends Resource implements Savable {
	
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
	
	public function getOpenHomeReportId() {
		return $this->getter("openHomeReportId", "int");
	}
	
	public function setOpenHomeReportId($openHomeReportId): self {
		$this->setter("openHomeReportId", $openHomeReportId);
		return $this;
	}
	
	public function getSubscriberId() {
		return $this->getter("subscriberId", "int");
	}
	
	public function setSubscriberId($subscriberId): self {
		$this->setter("subscriberId", $subscriberId);
		return $this;
	}
	
	public function getOpenHomeReport(): OpenHomeReport {
		return $this->getter("openHomeReport", OpenHomeReport::class);
	}
	
	public function setOpenHomeReport(OpenHomeReport $openHomeReport): self {
		if($openHomeReport->isTransient()) {
			throw new UnsavedResourceException($openHomeReport);
		}
		$this->setOpenHomeReportId($openHomeReport->getId());
		$this->setter("openHomeReport", $openHomeReport);
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
		saveHelper(Url::OPEN_HOME_REPORT_SUBSCRIPTIONS);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"openHomeReportId",
			"subscriberId"
		];
	}
	
}