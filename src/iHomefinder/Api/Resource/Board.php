<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;

use \iHomefinder\Api\Resource;

class Board extends Resource {
	
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
	
	public function getName() {
		return $this->getter("name", "int"); 
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getAbbreviation() {
		return $this->getter("abbreviation", "string");
	}
	
	public function setAbbreviation($abbreviation): self {
		$this->setter("abbreviation", $abbreviation);
		return $this;
	}
	
	protected function getFieldNames(): array {
		return [
			"id",
			"name",
			"abbreviation"
		];
	}
	
}