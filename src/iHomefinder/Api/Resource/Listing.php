<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;

class Listing extends Resource {
	
	public function __construct(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", "string");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getListingNumber() {
		return $this->getter("listingNumber", "string");
	}
	
	public function setListingNumber($listingNumber): self {
		$this->setter("listingNumber", $listingNumber);
		return $this;
	}
	
	public function getBoardId() {
		return $this->getter("boardId", "string");
	}
	
	public function setBoardId($boardId): self {
		$this->setter("boardId", $boardId);
		return $this;
	}
	
	public function getBedrooms() {
		return $this->getter("bedrooms", "string");
	}
	
	public function setBedrooms($bedrooms): self {
		$this->setter("bedrooms", $bedrooms);
		return $this;
	}
	
	public function getFullBathrooms() {
		return $this->getter("fullBathrooms", "string");
	}
	
	public function setFullBathrooms($fullBathrooms): self {
		$this->setter("fullBathrooms", $fullBathrooms);
		return $this;
	}
	
	public function getPartialBathrooms() {
		return $this->getter("partialBathrooms", "string");
	}
	
	public function setPartialBathrooms($partialBathrooms): self {
		$this->setter("partialBathrooms", $partialBathrooms);
		return $this;
	}
	
	public function getBoard(): Board {
		return $this->getter("board", Board::class);
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"listingNumber",
			"boardId",
			"bedrooms",
			"fullBathrooms",
			"partialBathrooms"
		];
	}
	
}