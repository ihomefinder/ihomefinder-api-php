<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Exception\UnsavedResourceException;

class ContactRequest extends Resource {
	
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
	
	public function getCreatedOn() {
		return $this->getter("createdOn");
	}
	
	public function setCreatedOn($createdOn): self {
		$this->setter("createdOn", $createdOn);
		return $this;
	}
	
	public function getMessage() {
		return $this->getter("message");
	}
	
	public function setMessage($message): self {
		$this->setter("message", $message);
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
	
	protected function getFieldNames(): array {
		return [
			"id",
			"subscriberId",
			"createdOn",
			"message",
		];
	}
	
}