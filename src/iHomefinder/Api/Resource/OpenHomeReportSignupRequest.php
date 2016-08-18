<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class OpenHomeReportSignupRequest extends Resource {
	
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
	
	public function getOpenHomeReportId() {
		return $this->getter("openHomeReportId");
	}
	
	public function setOpenHomeReportId($openHomeReportId): self {
		$this->setter("openHomeReportId", $openHomeReportId);
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
	
	public function getOpenHomeReport() {
		return $this->getter("openHomeReport", OpenHomeReport::class);
	}
	
	public function setOpenHomeReport(OpenHomeReport $openHomeReport): self {
		if(ResourceWrapper::getInstance($openHomeReport)->isTransient()) {
			throw new UnsavedResourceException($openHomeReport);
		}
		$this->setListingId($openHomeReport->getId());
		$this->setter("openHomeReport", $openHomeReport);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"subscriberId",
			"openHomeReportId",
			"createdOn",
			"message",
		];
	}
	
}