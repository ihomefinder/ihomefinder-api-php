<?php

namespace iHomefinder\Api\Resource;

use iHomefinder\Api\Resource;

class Board extends Resource {
	
	public function getId(): int {
		return $this->getter("id");
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getName() {
		return $this->getter("name"); 
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getAbbreviation() {
		return $this->getter("abbreviation");
	}
	
	public function setAbbreviation($abbreviation): self {
		$this->setter("abbreviation", $abbreviation);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"name",
			"abbreviation",
		];
	}
	
}