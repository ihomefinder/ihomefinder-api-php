<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;

class Listing extends Resource {
	
	public function getId(): string {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getListingNumber() {
		return $this->getter("listingNumber");
	}
	
	public function setListingNumber($listingNumber): self {
		$this->setter("listingNumber", $listingNumber);
		return $this;
	}
	
	public function getBoardId() {
		return $this->getter("boardId");
	}
	
	public function setBoardId($boardId): self {
		$this->setter("boardId", $boardId);
		return $this;
	}
	
	public function getBedrooms() {
		return $this->getter("bedrooms");
	}
	
	public function setBedrooms($bedrooms): self {
		$this->setter("bedrooms", $bedrooms);
		return $this;
	}
	
	public function getFullBathrooms() {
		return $this->getter("fullBathrooms");
	}
	
	public function setFullBathrooms($fullBathrooms): self {
		$this->setter("fullBathrooms", $fullBathrooms);
		return $this;
	}
	
	public function getPartialBathrooms() {
		return $this->getter("partialBathrooms");
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
			"partialBathrooms",
		];
	}
	
}