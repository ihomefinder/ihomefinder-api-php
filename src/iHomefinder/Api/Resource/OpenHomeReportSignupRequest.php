<?php

namespace iHomefinder\Api\Resource;



use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;
use \iHomefinder\Api\Exception\UnsavedResourceException;

class OpenHomeReportSignupRequest extends Resource {
	
	public function OpenHomeReportSignupRequest(Authentication $auth) {
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
	
	public function getOpenHomeReportId() {
		return $this->getter("openHomeReportId", Integer::class);
	}
	
	public function setOpenHomeReportId($openHomeReportId): self {
		$this->setter("openHomeReportId", $openHomeReportId);
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
	
	public function getOpenHomeReport(): OpenHomeReport {
		return $this->getter("openHomeReport", OpenHomeReport::class);
	}
	
	public function setOpenHomeReport(OpenHomeReport $openHomeReport): self {
		if($openHomeReport->isTransient()) {
			throw new UnsavedResourceException(openHomeReport);
		}
		$this->setOpenHomeReportId($openHomeReport->getId());
		$this->setter("openHomeReport", $openHomeReport);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"subscriberId",
			"openHomeReportId",
			"createdOn"
		];
	}
	
}