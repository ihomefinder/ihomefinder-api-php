<?php

namespace iHomefinder\Api\Resource;

use \iHomefinder\Api\Authentication;
use \iHomefinder\Api\Fields;
use \iHomefinder\Api\Resource;

class Board extends Resource {
	
	public function Board(Authentication $auth) {
		parent::__construct($auth);
	}

	public function getId() {
		return $this->getter("id", Integer::class);
	}
	
	public function setId($id): self {
		$this->setter("id", $id);
		return $this;
	}
	
	public function getName() {
		return $this->getter("name", Integer::class); 
	}
	
	public function setName($name): self {
		$this->setter("name", $name);
		return $this;
	}
	
	public function getAbbreviation() {
		return $this->getter("abbreviation", String::class);
	}
	
	public function setAbbreviation($abbreviation): self {
		$this->setter("abbreviation", $abbreviation);
		return $this;
	}
	
	protected function getFieldNames(): Fields {
		return [
			"id",
			"name",
			"abbreviation"
		];
	}
	
}