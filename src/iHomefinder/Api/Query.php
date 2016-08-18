<?php

namespace iHomefinder\Api;

use iHomefinder\Api\Resource;
use iHomefinder\Api\ResourceWrapper;
use iHomefinder\Api\Request;

class Query {
	
	protected $fields = [];
	protected $where = [];
	protected $offset;
	protected $limit;
	
	public function select(string ...$fields) {
		$this->fields = $fields;
		return $this;
	}
	
	public function equal(string $fieldName, $fieldValue) {
		$this->where[$fieldName] = $fieldValue;
		return $this;
	}
	
	public function example(Resource $resource) {
		$wrapper = ResourceWrapper::getInstance($resource);
		$fields = $wrapper->getAllFieldsValues();
		foreach($fields as $fieldName => $fieldValue) {
			$this->equal($fieldName, $fieldValue);
		}
	}
	
	public function limit(int $limit) {
		$this->limit = $limit;
		return $this;
	}
	
	public function offset(int $offset) {
		$this->offset = $offset;
		return $this;
	}
	
	public function loadRequest(Request $request) {
		$request->setParameters($this->where);		
		if($this->offset !== null) {
			$request->setParameter("offset", $this->offset);
		}
		if($this->limit !== null) {
			$request->setParameter("limit", $this->limit);
		}
		if(!empty($this->fields)) {
			$result["fields"] = join(",", $this->fields);
		}
		return $result;
	}
	
}